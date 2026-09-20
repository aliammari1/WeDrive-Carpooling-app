<?php

declare(strict_types=1);

namespace WeDrive\Ai;

/**
 * AI ride-matching: scores how well a passenger's pickup/drop-off fits onto a
 * driver's existing route, by measuring the detour the driver must take, and
 * estimates the CO2 saved by sharing the ride instead of driving separately.
 *
 * Routing is delegated to a RouteProvider. When the live OpenRouteService
 * provider throws (no key, network error, rate limit), the matcher gracefully
 * falls back to the offline haversine provider so matching always works.
 */
final class RideMatcher
{
    /**
     * Average passenger-car emissions, kg CO2 per km (EU fleet average ~0.12).
     */
    private const CO2_KG_PER_KM = 0.12;

    private RouteProvider $fallback;

    public function __construct(
        private readonly RouteProvider $provider,
        ?RouteProvider $fallback = null,
    ) {
        $this->fallback = $fallback ?? new HaversineRouteProvider();
    }

    /**
     * Build a matcher from the environment: uses OpenRouteService if ORS_API_KEY
     * is set, otherwise the offline haversine provider.
     */
    public static function fromEnv(): self
    {
        $key = $_ENV['ORS_API_KEY'] ?? getenv('ORS_API_KEY') ?: '';
        if (is_string($key) && $key !== '') {
            return new self(new OpenRouteServiceProvider($key));
        }

        return new self(new HaversineRouteProvider());
    }

    /**
     * Score a single driver/passenger pairing.
     *
     * @param GeoPoint $driverOrigin       driver's start
     * @param GeoPoint $driverDestination  driver's end
     * @param GeoPoint $passengerPickup    where the passenger boards
     * @param GeoPoint $passengerDropoff   where the passenger alights
     */
    public function score(
        GeoPoint $driverOrigin,
        GeoPoint $driverDestination,
        GeoPoint $passengerPickup,
        GeoPoint $passengerDropoff,
    ): MatchResult {
        [$base, $live1] = $this->routeSafely([$driverOrigin, $driverDestination]);
        [$shared, $live2] = $this->routeSafely([
            $driverOrigin,
            $passengerPickup,
            $passengerDropoff,
            $driverDestination,
        ]);

        $baseKm   = $base['distance_km'];
        $sharedKm = max($shared['distance_km'], $baseKm); // detour can't be negative
        $detourKm = round($sharedKm - $baseKm, 2);
        $detourMin = round(max(0.0, $shared['duration_min'] - $base['duration_min']), 1);

        // Passenger's own direct trip distance — what they'd otherwise drive.
        [$passengerTrip] = $this->routeSafely([$passengerPickup, $passengerDropoff]);
        $passengerKm = $passengerTrip['distance_km'];

        // CO2 saved = passenger's avoided solo trip minus the driver's extra
        // detour emissions (both at fleet-average intensity), floored at zero.
        $co2SavedKg = round(
            max(0.0, ($passengerKm - $detourKm) * self::CO2_KG_PER_KM),
            3
        );

        $score = $this->computeScore($detourKm, $baseKm, $passengerKm);

        return new MatchResult(
            score: $score,
            detourKm: $detourKm,
            detourMin: $detourMin,
            baseKm: $baseKm,
            sharedKm: $sharedKm,
            co2SavedKg: $co2SavedKg,
            usedLiveRouting: $live1 && $live2,
        );
    }

    /**
     * Rank a passenger request against many candidate driver trajets.
     *
     * @param array<int,array{
     *     id: int|string,
     *     origin: GeoPoint,
     *     destination: GeoPoint
     * }> $trajets
     * @return array<int,array{trajet_id:int|string, match:MatchResult}>
     *         sorted best-first
     */
    public function rank(
        array $trajets,
        GeoPoint $passengerPickup,
        GeoPoint $passengerDropoff,
    ): array {
        $ranked = [];
        foreach ($trajets as $trajet) {
            $match = $this->score(
                $trajet['origin'],
                $trajet['destination'],
                $passengerPickup,
                $passengerDropoff,
            );
            $ranked[] = ['trajet_id' => $trajet['id'], 'match' => $match];
        }

        usort(
            $ranked,
            static fn (array $a, array $b): int => $b['match']->score <=> $a['match']->score
        );

        return $ranked;
    }

    /**
     * Convert a detour into a 0..100 score. A zero-detour ride that covers the
     * passenger's whole trip scores ~100; the score decays as the detour grows
     * relative to how far the passenger actually needs to go.
     */
    private function computeScore(float $detourKm, float $baseKm, float $passengerKm): float
    {
        if ($passengerKm <= 0.0) {
            return 0.0;
        }

        // Detour as a fraction of the passenger's own trip length. A detour
        // equal to the passenger trip => score 0; no detour => score 100.
        $ratio = $detourKm / $passengerKm;
        $score = (1.0 - $ratio) * 100.0;

        return round(max(0.0, min(100.0, $score)), 1);
    }

    /**
     * @param GeoPoint[] $waypoints
     * @return array{0: array{distance_km: float, duration_min: float}, 1: bool}
     */
    private function routeSafely(array $waypoints): array
    {
        try {
            return [$this->provider->route($waypoints), $this->provider->isLive()];
        } catch (\Throwable) {
            return [$this->fallback->route($waypoints), false];
        }
    }
}
