<?php

declare(strict_types=1);

namespace WeDrive\Ai;

/**
 * The scored compatibility between a driver's planned trajet and a passenger's
 * pickup/drop-off request.
 */
final class MatchResult
{
    public function __construct(
        /** 0..100 compatibility score (higher = better match). */
        public readonly float $score,
        /** Extra distance the driver drives to serve this passenger (km). */
        public readonly float $detourKm,
        /** Extra time added to the driver's trip (minutes). */
        public readonly float $detourMin,
        /** Direct driver-only trip distance (km). */
        public readonly float $baseKm,
        /** Driver trip distance WITH the detour (km). */
        public readonly float $sharedKm,
        /** Estimated CO2 saved by carpooling instead of two separate cars (kg). */
        public readonly float $co2SavedKg,
        /** Whether the routing came from a live API or the offline fallback. */
        public readonly bool $usedLiveRouting,
    ) {
    }

    public function toArray(): array
    {
        return [
            'score'              => $this->score,
            'detour_km'          => $this->detourKm,
            'detour_min'         => $this->detourMin,
            'base_km'            => $this->baseKm,
            'shared_km'          => $this->sharedKm,
            'co2_saved_kg'       => $this->co2SavedKg,
            'used_live_routing'  => $this->usedLiveRouting,
        ];
    }
}
