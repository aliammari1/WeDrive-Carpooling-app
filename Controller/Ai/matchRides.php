<?php

declare(strict_types=1);

/**
 * AI ride-matching endpoint.
 *
 * Given a passenger pickup + drop-off (as "lat,lng" strings), scores every
 * driver trajet by detour and CO2 saved, and returns a JSON list best-first.
 *
 * GET/POST params:
 *   pickup   = "lat,lng"
 *   dropoff  = "lat,lng"
 *
 * Uses OpenRouteService when ORS_API_KEY is set, otherwise an offline haversine
 * fallback (so it works with no key, just less precisely).
 */

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Model/trajets/trajetC.php';

use WeDrive\Ai\GeoPoint;
use WeDrive\Ai\RideMatcher;
use WeDrive\Bootstrap;
use WeDrive\Http\RateLimiter;
use WeDrive\Http\SecurityHeaders;
use WeDrive\Observability\Logger;

Bootstrap::init();
SecurityHeaders::send(apiJson: true);
header('Content-Type: application/json');

// Throttle this public, AI-backed endpoint: 30 requests / minute / IP.
$limiter = new RateLimiter('match_rides', limit: 30, windowSeconds: 60);
$state = $limiter->hit(RateLimiter::clientIp());
$limiter->sendHeaders($state);
if (!$state->allowed()) {
    $limiter->sendRetryAfter($state->resetInSeconds);
    Logger::get()->warning('rate_limit_exceeded', ['endpoint' => 'matchRides']);
    echo json_encode(['error' => 'Too many requests. Slow down.']);
    exit;
}

try {
    $pickupRaw  = $_REQUEST['pickup']  ?? '';
    $dropoffRaw = $_REQUEST['dropoff'] ?? '';

    $pickup  = GeoPoint::fromString((string) $pickupRaw);
    $dropoff = GeoPoint::fromString((string) $dropoffRaw);

    // Pull driver trajets. trajets.lien_depar_arriver stores "origin|dest" as
    // two "lat,lng" points separated by a pipe (or "->").
    $trajetModel = new trajetC();
    $rows = $trajetModel->Affichertraject();

    $candidates = [];
    foreach ($rows as $row) {
        $link = (string) ($row['lien_depar_arriver'] ?? '');
        $parts = preg_split('/\s*(\||->)\s*/', $link);
        if (!is_array($parts) || count($parts) < 2) {
            continue;
        }
        try {
            $candidates[] = [
                'id'          => $row['idtrajet'] ?? null,
                'origin'      => GeoPoint::fromString($parts[0]),
                'destination' => GeoPoint::fromString($parts[1]),
            ];
        } catch (\Throwable) {
            continue; // skip trajets without parseable coordinates
        }
    }

    $matcher = RideMatcher::fromEnv();
    $ranked = $matcher->rank($candidates, $pickup, $dropoff);

    $payload = array_map(
        static fn (array $r): array => [
            'trajet_id' => $r['trajet_id'],
            'match'     => $r['match']->toArray(),
        ],
        $ranked
    );

    echo json_encode(['results' => $payload], JSON_PRETTY_PRINT);
} catch (\InvalidArgumentException $e) {
    http_response_code(400);
    Logger::get()->info('match_rides_bad_request', ['message' => $e->getMessage()]);
    echo json_encode(['error' => $e->getMessage()]);
} catch (\Throwable $e) {
    http_response_code(500);
    Logger::get()->error('match_rides_failed', [
        'exception' => $e::class,
        'message'   => $e->getMessage(),
    ]);
    \WeDrive\Observability\Sentry::capture($e);
    echo json_encode(['error' => 'Ride matching failed.']);
}
