<?php

declare(strict_types=1);

namespace WeDrive\Ai;

/**
 * Offline fallback route provider: straight-line (haversine) distance with a
 * road-winding correction factor and an average-speed assumption. Used when no
 * OpenRouteService API key is configured, so the AI matching feature still
 * works (degraded but functional) with zero external dependencies.
 */
final class HaversineRouteProvider implements RouteProvider
{
    /** Roads are longer than straight lines; ~1.3 is a common detour ratio. */
    private const ROAD_WINDING_FACTOR = 1.3;

    /** Assumed average speed (km/h) for duration estimates. */
    private const AVG_SPEED_KMH = 50.0;

    public function route(array $waypoints): array
    {
        if (count($waypoints) < 2) {
            return ['distance_km' => 0.0, 'duration_min' => 0.0];
        }

        $distanceKm = 0.0;
        for ($i = 1, $n = count($waypoints); $i < $n; $i++) {
            $distanceKm += $waypoints[$i - 1]->haversineKm($waypoints[$i]);
        }
        $distanceKm *= self::ROAD_WINDING_FACTOR;

        $durationMin = ($distanceKm / self::AVG_SPEED_KMH) * 60.0;

        return [
            'distance_km'  => round($distanceKm, 2),
            'duration_min' => round($durationMin, 1),
        ];
    }

    public function isLive(): bool
    {
        return false;
    }
}
