# AI Ride Matching & CO₂ Score

WeDrive scores how compatible a passenger's pickup/drop-off is with each driver's
planned trajet, and estimates the CO₂ saved by sharing the ride.

## How it works

1. The driver's direct route (origin → destination) gives a **base distance**.
2. Inserting the passenger's pickup and drop-off into that route
   (origin → pickup → dropoff → destination) gives a **shared distance**.
3. The **detour** is `shared − base` (km and minutes).
4. The **score** (0–100) decays with the detour relative to the passenger's own
   trip length: a zero-detour ride that covers the whole passenger trip scores
   ~100; a detour as long as the passenger trip scores ~0.
5. **CO₂ saved** ≈ `(passenger_trip_km − detour_km) × 0.12 kg/km`
   (EU fleet-average intensity), floored at zero.

## Routing backends

| Provider | When | Notes |
|---|---|---|
| `OpenRouteServiceProvider` | `ORS_API_KEY` is set | Real road distances via the free [OpenRouteService](https://openrouteservice.org) Directions API |
| `HaversineRouteProvider` | no key, or API error | Offline straight-line distance × 1.3 winding factor, 50 km/h average |

The matcher **degrades gracefully**: if the live provider throws (missing key,
network error, rate limit) it transparently falls back to haversine, so matching
never breaks. `MatchResult::usedLiveRouting` tells the UI which was used.

## Usage

```php
use WeDrive\Ai\GeoPoint;
use WeDrive\Ai\RideMatcher;

$matcher = RideMatcher::fromEnv();

$result = $matcher->score(
    driverOrigin:      new GeoPoint(36.8065, 10.1815), // Tunis
    driverDestination: new GeoPoint(35.8254, 10.6360), // Sousse
    passengerPickup:   new GeoPoint(36.4000, 10.6167),
    passengerDropoff:  new GeoPoint(35.8254, 10.6360),
);

echo $result->score;       // 0..100
echo $result->detourKm;    // extra km for the driver
echo $result->co2SavedKg;  // estimated CO2 saved
```

Ranking many trajets best-first:

```php
$ranked = $matcher->rank($trajets, $pickup, $dropoff);
$best = $ranked[0]['match'];
```

The HTTP endpoint is `Controller/Ai/matchRides.php?pickup=lat,lng&dropoff=lat,lng`,
returning JSON sorted best-first.
