<?php

declare(strict_types=1);

namespace WeDrive\Tests;

use PHPUnit\Framework\TestCase;
use WeDrive\Ai\GeoPoint;
use WeDrive\Ai\HaversineRouteProvider;
use WeDrive\Ai\RideMatcher;
use WeDrive\Ai\RouteProvider;

final class RideMatcherTest extends TestCase
{
    public function testGeoPointParsing(): void
    {
        $p = GeoPoint::fromString('36.8065, 10.1815'); // Tunis
        self::assertEqualsWithDelta(36.8065, $p->lat, 0.0001);
        self::assertEqualsWithDelta(10.1815, $p->lng, 0.0001);
    }

    public function testGeoPointRejectsGarbage(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        GeoPoint::fromString('not-a-point');
    }

    public function testHaversineDistanceIsReasonable(): void
    {
        $tunis = new GeoPoint(36.8065, 10.1815);
        $sousse = new GeoPoint(35.8254, 10.6360);
        // Tunis -> Sousse is ~115 km straight-line; allow a wide tolerance.
        self::assertGreaterThan(100, $tunis->haversineKm($sousse));
        self::assertLessThan(140, $tunis->haversineKm($sousse));
    }

    public function testZeroDetourScoresHigh(): void
    {
        // Passenger pickup/dropoff lie exactly on the driver's straight path.
        $origin = new GeoPoint(0.0, 0.0);
        $dest   = new GeoPoint(0.0, 1.0);
        $pickup = new GeoPoint(0.0, 0.25);
        $drop   = new GeoPoint(0.0, 0.75);

        $matcher = new RideMatcher(new HaversineRouteProvider());
        $result = $matcher->score($origin, $dest, $pickup, $drop);

        self::assertGreaterThan(90, $result->score);
        self::assertGreaterThan(0, $result->co2SavedKg);
        self::assertFalse($result->usedLiveRouting);
    }

    public function testLargeDetourScoresLowerThanSmallDetour(): void
    {
        $origin = new GeoPoint(0.0, 0.0);
        $dest   = new GeoPoint(0.0, 1.0);

        $matcher = new RideMatcher(new HaversineRouteProvider());

        $onPath = $matcher->score($origin, $dest, new GeoPoint(0.0, 0.4), new GeoPoint(0.0, 0.6));
        $offPath = $matcher->score($origin, $dest, new GeoPoint(0.5, 0.4), new GeoPoint(0.5, 0.6));

        self::assertGreaterThan($offPath->score, $onPath->score);
    }

    public function testRankSortsBestFirst(): void
    {
        $matcher = new RideMatcher(new HaversineRouteProvider());
        $pickup = new GeoPoint(0.0, 0.4);
        $drop   = new GeoPoint(0.0, 0.6);

        $trajets = [
            ['id' => 'far',  'origin' => new GeoPoint(2.0, 0.0), 'destination' => new GeoPoint(2.0, 1.0)],
            ['id' => 'near', 'origin' => new GeoPoint(0.0, 0.0), 'destination' => new GeoPoint(0.0, 1.0)],
        ];

        $ranked = $matcher->rank($trajets, $pickup, $drop);
        self::assertSame('near', $ranked[0]['trajet_id']);
    }

    public function testFallsBackWhenProviderThrows(): void
    {
        $broken = new class implements RouteProvider {
            public function route(array $waypoints): array
            {
                throw new \RuntimeException('boom');
            }
            public function isLive(): bool
            {
                return true;
            }
        };

        $matcher = new RideMatcher($broken, new HaversineRouteProvider());
        $result = $matcher->score(
            new GeoPoint(0.0, 0.0),
            new GeoPoint(0.0, 1.0),
            new GeoPoint(0.0, 0.25),
            new GeoPoint(0.0, 0.75),
        );

        // Did not crash; produced a result via the fallback.
        self::assertFalse($result->usedLiveRouting);
        self::assertGreaterThanOrEqual(0, $result->score);
    }
}
