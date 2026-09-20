<?php

declare(strict_types=1);

namespace WeDrive\Http;

/**
 * Emits a hardened set of HTTP security response headers, including a
 * Content-Security-Policy.
 *
 * The hand-rolled MVC has no central HTTP kernel, so this is a tiny, dependency
 * free helper you call once at the top of a front controller / page (or from the
 * shared {@see \WeDrive\Bootstrap}). It is intentionally conservative: the legacy
 * Argon/Bootstrap views inline some styles and scripts, so the default CSP still
 * allows `'unsafe-inline'` for styles. Tightening to a nonce-based CSP is tracked
 * in the modernization backlog.
 *
 * Usage:
 *   \WeDrive\Http\SecurityHeaders::send();              // HTML pages
 *   \WeDrive\Http\SecurityHeaders::send(apiJson: true); // JSON endpoints (strict CSP)
 */
final class SecurityHeaders
{
    /**
     * @param bool $apiJson When true, applies a locked-down CSP suitable for a
     *                      pure-JSON endpoint (no scripts/styles/images at all).
     * @param array<string,string> $overrides Optional header => value overrides.
     */
    public static function send(bool $apiJson = false, array $overrides = []): void
    {
        if (headers_sent()) {
            return;
        }

        $headers = self::headers($apiJson);
        foreach ($overrides as $name => $value) {
            $headers[$name] = $value;
        }

        foreach ($headers as $name => $value) {
            header($name . ': ' . $value);
        }

        // Remove fingerprinting headers where the SAPI allows it.
        header_remove('X-Powered-By');
    }

    /**
     * Build the header map without sending it — handy for tests.
     *
     * @return array<string,string>
     */
    public static function headers(bool $apiJson = false): array
    {
        $csp = $apiJson
            ? "default-src 'none'; frame-ancestors 'none'; base-uri 'none'"
            : self::pageCsp();

        return [
            'Content-Security-Policy'   => $csp,
            'X-Content-Type-Options'    => 'nosniff',
            'X-Frame-Options'           => 'DENY',
            'Referrer-Policy'           => 'strict-origin-when-cross-origin',
            'Permissions-Policy'        => 'geolocation=(self), camera=(), microphone=(), payment=()',
            'Cross-Origin-Opener-Policy' => 'same-origin',
            // HSTS is only meaningful over HTTPS; harmless on http but kept
            // modest so a misconfigured local dev box is not pinned for a year.
            'Strict-Transport-Security' => 'max-age=15768000; includeSubDomains',
        ];
    }

    /**
     * CSP for HTML pages. Allows the bundled Argon/Bootstrap assets plus the
     * OpenStreetMap / OpenRouteService tiles the map UI uses, and self-hosted
     * inline styles (legacy theme). Scripts are restricted to self + the
     * minimal CDNs the views already load.
     */
    private static function pageCsp(): string
    {
        return implode('; ', [
            "default-src 'self'",
            "base-uri 'self'",
            "frame-ancestors 'none'",
            "object-src 'none'",
            "img-src 'self' data: https://*.tile.openstreetmap.org https://api.openrouteservice.org",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net",
            "font-src 'self' data: https://fonts.gstatic.com",
            "script-src 'self' https://cdn.jsdelivr.net https://code.jquery.com",
            "connect-src 'self' https://api.openrouteservice.org https://nominatim.openstreetmap.org",
            "form-action 'self'",
        ]);
    }
}
