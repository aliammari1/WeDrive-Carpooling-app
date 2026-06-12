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

header('Content-Type: application/json');

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
    echo json_encode(['error' => $e->getMessage()]);
} catch (\Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Ride matching failed.']);
}
