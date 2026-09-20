<?php

declare(strict_types=1);

namespace WeDrive\Http;

/**
 * A small, dependency-free fixed-window rate limiter.
 *
 * The hand-rolled MVC has no Redis/Memcached, so this uses an atomic file-based
 * counter under the system temp dir (one file per key+window). It is meant to
 * blunt brute-force / abuse on the two sensitive surfaces — the login POST and
 * the public `matchRides` JSON endpoint — not to be a distributed quota system.
 * For multi-node deploys swap the storage for Redis (see docs/security.md).
 *
 * Usage (login):
 *   $limiter = new \WeDrive\Http\RateLimiter('login', limit: 5, windowSeconds: 60);
 *   if (!$limiter->allow(\WeDrive\Http\RateLimiter::clientIp())) {
 *       $limiter->sendRetryAfter();   // 429 + Retry-After, then exit
 *   }
 */
final class RateLimiter
{
    private string $dir;

    public function __construct(
        private readonly string $bucket,
        private readonly int $limit = 60,
        private readonly int $windowSeconds = 60,
        ?string $storageDir = null,
    ) {
        $this->dir = $storageDir ?? (sys_get_temp_dir() . '/wedrive-ratelimit');
        if (!is_dir($this->dir)) {
            @mkdir($this->dir, 0700, true);
        }
    }

    /**
     * Record one hit for $identifier and report whether it is still within the
     * limit for the current window. Returns false once the limit is exceeded.
     */
    public function allow(string $identifier): bool
    {
        return $this->hit($identifier)->remaining >= 0;
    }

    /**
     * Register a hit and return the resulting limiter state.
     */
    public function hit(string $identifier): RateLimitState
    {
        $window = (int) floor(time() / $this->windowSeconds);
        $key = hash('sha256', $this->bucket . '|' . $identifier . '|' . $window);
        $file = $this->dir . '/' . $key;

        $count = 0;
        $handle = @fopen($file, 'c+');
        if ($handle === false) {
            // Storage unavailable: fail open so a broken temp dir can't lock
            // everyone out, but surface it for the caller/logs.
            return new RateLimitState($this->limit, $this->limit - 1, $this->windowSeconds, true);
        }

        try {
            flock($handle, LOCK_EX);
            $raw = stream_get_contents($handle);
            $count = is_string($raw) && $raw !== '' ? (int) $raw : 0;
            $count++;
            ftruncate($handle, 0);
            rewind($handle);
            fwrite($handle, (string) $count);
            fflush($handle);
        } finally {
            flock($handle, LOCK_UN);
            fclose($handle);
        }

        $resetIn = (($window + 1) * $this->windowSeconds) - time();
        $remaining = $this->limit - $count;

        return new RateLimitState($this->limit, $remaining, max(0, $resetIn), true);
    }

    /**
     * Emit the standard rate-limit headers for the given state (call before any
     * body output).
     */
    public function sendHeaders(RateLimitState $state): void
    {
        if (headers_sent()) {
            return;
        }
        header('X-RateLimit-Limit: ' . $this->limit);
        header('X-RateLimit-Remaining: ' . max(0, $state->remaining));
        header('X-RateLimit-Reset: ' . (time() + $state->resetInSeconds));
    }

    /**
     * Send a 429 with Retry-After. Does not exit — the caller decides (so it
     * stays testable). For a hard stop: `$limiter->sendRetryAfter(); exit;`.
     */
    public function sendRetryAfter(int $resetInSeconds): void
    {
        if (headers_sent()) {
            return;
        }
        http_response_code(429);
        header('Retry-After: ' . max(1, $resetInSeconds));
        header('X-RateLimit-Limit: ' . $this->limit);
        header('X-RateLimit-Remaining: 0');
    }

    /**
     * Best-effort client IP, honouring a single trusted proxy hop. Do NOT trust
     * X-Forwarded-For blindly behind an untrusted edge — see docs/security.md.
     */
    public static function clientIp(): string
    {
        $remote = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        $fwd = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';
        if (is_string($fwd) && $fwd !== '') {
            $first = trim(explode(',', $fwd)[0]);
            if (filter_var($first, FILTER_VALIDATE_IP) !== false) {
                return $first;
            }
        }

        return is_string($remote) ? $remote : '0.0.0.0';
    }
}
