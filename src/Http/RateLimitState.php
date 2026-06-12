<?php

declare(strict_types=1);

namespace WeDrive\Http;

/**
 * Immutable result of a {@see RateLimiter} hit.
 */
final class RateLimitState
{
    public function __construct(
        public readonly int $limit,
        public readonly int $remaining,
        public readonly int $resetInSeconds,
        public readonly bool $storageAvailable,
    ) {
    }

    /** True when this hit is within the allowed budget. */
    public function allowed(): bool
    {
        return $this->remaining >= 0;
    }
}
