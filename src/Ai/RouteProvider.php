<?php

declare(strict_types=1);

namespace WeDrive\Ai;

/**
 * Abstraction over a routing backend so the matcher can be tested without
 * hitting the network. Implementations return the road distance (km) and
 * duration (minutes) for an ordered list of waypoints.
 */
interface RouteProvider
{
    /**
     * @param GeoPoint[] $waypoints ordered list of points to route through
     * @return array{distance_km: float, duration_min: float}
     */
    public function route(array $waypoints): array;

    /**
     * Whether this provider talks to a real routing service (true) or is the
     * offline straight-line fallback (false). Surfaced so the UI can label
     * estimates honestly.
     */
    public function isLive(): bool;
}
