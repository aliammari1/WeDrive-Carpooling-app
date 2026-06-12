<?php

declare(strict_types=1);

namespace WeDrive\Tests;

use PHPUnit\Framework\TestCase;
use WeDrive\Http\RateLimiter;

final class RateLimiterTest extends TestCase
{
    private string $dir;

    protected function setUp(): void
    {
        $this->dir = sys_get_temp_dir() . '/wedrive-ratelimit-test-' . bin2hex(random_bytes(4));
    }

    protected function tearDown(): void
    {
        if (is_dir($this->dir)) {
            foreach ((array) glob($this->dir . '/*') as $f) {
                @unlink((string) $f);
            }
            @rmdir($this->dir);
        }
    }

    public function testAllowsUpToLimitThenBlocks(): void
    {
        $limiter = new RateLimiter('test', limit: 3, windowSeconds: 60, storageDir: $this->dir);

        self::assertTrue($limiter->allow('1.2.3.4'));  // 1
        self::assertTrue($limiter->allow('1.2.3.4'));  // 2
        self::assertTrue($limiter->allow('1.2.3.4'));  // 3 (== limit)
        self::assertFalse($limiter->allow('1.2.3.4')); // 4 (over)
    }

    public function testRemainingDecrements(): void
    {
        $limiter = new RateLimiter('test', limit: 5, windowSeconds: 60, storageDir: $this->dir);

        $first = $limiter->hit('a');
        self::assertSame(4, $first->remaining);
        self::assertTrue($first->allowed());

        $second = $limiter->hit('a');
        self::assertSame(3, $second->remaining);
    }

    public function testDifferentIdentifiersAreIndependent(): void
    {
        $limiter = new RateLimiter('test', limit: 1, windowSeconds: 60, storageDir: $this->dir);

        self::assertTrue($limiter->allow('ip-a'));
        self::assertFalse($limiter->allow('ip-a'));
        self::assertTrue($limiter->allow('ip-b')); // separate bucket
    }

    public function testResetInSecondsWithinWindow(): void
    {
        $limiter = new RateLimiter('test', limit: 2, windowSeconds: 60, storageDir: $this->dir);
        $state = $limiter->hit('x');

        self::assertGreaterThan(0, $state->resetInSeconds);
        self::assertLessThanOrEqual(60, $state->resetInSeconds);
    }

    public function testClientIpHonoursValidForwardedFor(): void
    {
        $_SERVER['REMOTE_ADDR'] = '10.0.0.1';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = '203.0.113.7, 10.0.0.1';
        self::assertSame('203.0.113.7', RateLimiter::clientIp());

        unset($_SERVER['HTTP_X_FORWARDED_FOR']);
        self::assertSame('10.0.0.1', RateLimiter::clientIp());
    }

    public function testClientIpIgnoresGarbageForwardedFor(): void
    {
        $_SERVER['REMOTE_ADDR'] = '10.0.0.2';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = 'not-an-ip';
        self::assertSame('10.0.0.2', RateLimiter::clientIp());
        unset($_SERVER['HTTP_X_FORWARDED_FOR']);
    }
}
