<?php

declare(strict_types=1);

namespace WeDrive\Ai;

/**
 * An immutable latitude/longitude coordinate.
 */
final class GeoPoint
{
    public function __construct(
        public readonly float $lat,
        public readonly float $lng,
    ) {
    }

    /**
     * Parse "lat,lng" (the format stored in trajets.lien_depar_arriver halves).
     */
    public static function fromString(string $value): self
    {
        $parts = array_map('trim', explode(',', $value));
        if (count($parts) < 2 || !is_numeric($parts[0]) || !is_numeric($parts[1])) {
            throw new \InvalidArgumentException("Invalid 'lat,lng' point: {$value}");
        }

        return new self((float) $parts[0], (float) $parts[1]);
    }

    /**
     * Great-circle (haversine) distance in kilometres to another point.
     * Used as the offline fallback when no routing API key is configured.
     */
    public function haversineKm(GeoPoint $other): float
    {
        $earthRadiusKm = 6371.0;
        $dLat = deg2rad($other->lat - $this->lat);
        $dLng = deg2rad($other->lng - $this->lng);

        $a = sin($dLat / 2) ** 2
            + cos(deg2rad($this->lat)) * cos(deg2rad($other->lat)) * sin($dLng / 2) ** 2;

        return $earthRadiusKm * 2 * atan2(sqrt($a), sqrt(1 - $a));
    }

    /** ORS expects [lng, lat] ordering. */
    public function toOrsCoordinate(): array
    {
        return [$this->lng, $this->lat];
    }
}
