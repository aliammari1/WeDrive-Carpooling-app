<?php

declare(strict_types=1);

namespace WeDrive\Ai;

/**
 * Routing backed by the OpenRouteService free Directions API.
 *
 * Docs: https://openrouteservice.org/dev/#/api-docs/v2/directions
 * A free API key (ORS_API_KEY) is required. If the request fails for any
 * reason, the caller (RideMatcher) transparently falls back to haversine, so a
 * transient ORS outage never breaks ride matching.
 */
final class OpenRouteServiceProvider implements RouteProvider
{
    private const ENDPOINT = 'https://api.openrouteservice.org/v2/directions/driving-car';

    public function __construct(
        private readonly string $apiKey,
        private readonly int $timeoutSeconds = 8,
    ) {
        if ($apiKey === '') {
            throw new \InvalidArgumentException('OpenRouteService API key is required.');
        }
    }

    public function route(array $waypoints): array
    {
        if (count($waypoints) < 2) {
            return ['distance_km' => 0.0, 'duration_min' => 0.0];
        }

        $coordinates = array_map(
            static fn (GeoPoint $p): array => $p->toOrsCoordinate(),
            $waypoints
        );

        $payload = json_encode(['coordinates' => $coordinates], JSON_THROW_ON_ERROR);
        $response = $this->post($payload);
        $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        $summary = $data['routes'][0]['summary'] ?? null;
        if (!is_array($summary) || !isset($summary['distance'], $summary['duration'])) {
            throw new \RuntimeException('Unexpected OpenRouteService response.');
        }

        return [
            'distance_km'  => round(((float) $summary['distance']) / 1000.0, 2),
            'duration_min' => round(((float) $summary['duration']) / 60.0, 1),
        ];
    }

    public function isLive(): bool
    {
        return true;
    }

    /**
     * Perform the POST. Extracted so it can be overridden/mocked in tests.
     */
    protected function post(string $jsonBody): string
    {
        $ch = curl_init(self::ENDPOINT);
        if ($ch === false) {
            throw new \RuntimeException('Unable to initialise HTTP client.');
        }

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $jsonBody,
            CURLOPT_TIMEOUT        => $this->timeoutSeconds,
            CURLOPT_HTTPHEADER     => [
                'Authorization: ' . $this->apiKey,
                'Content-Type: application/json',
                'Accept: application/json',
            ],
        ]);

        $body = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($body === false || $status >= 400) {
            throw new \RuntimeException(
                "OpenRouteService request failed (HTTP {$status}): {$error}"
            );
        }

        return (string) $body;
    }
}
