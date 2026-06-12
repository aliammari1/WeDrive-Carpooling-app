<?php

declare(strict_types=1);

namespace WeDrive\Tests;

use PHPUnit\Framework\TestCase;
use WeDrive\Http\SecurityHeaders;

final class SecurityHeadersTest extends TestCase
{
    public function testPageHeadersIncludeCoreProtections(): void
    {
        $h = SecurityHeaders::headers();

        self::assertSame('nosniff', $h['X-Content-Type-Options']);
        self::assertSame('DENY', $h['X-Frame-Options']);
        self::assertArrayHasKey('Content-Security-Policy', $h);
        self::assertArrayHasKey('Referrer-Policy', $h);
        self::assertArrayHasKey('Permissions-Policy', $h);
        self::assertArrayHasKey('Strict-Transport-Security', $h);
    }

    public function testPageCspAllowsSelfAndForbidsFraming(): void
    {
        $csp = SecurityHeaders::headers()['Content-Security-Policy'];

        self::assertStringContainsString("default-src 'self'", $csp);
        self::assertStringContainsString("frame-ancestors 'none'", $csp);
        self::assertStringContainsString("object-src 'none'", $csp);
    }

    public function testApiCspIsLockedDown(): void
    {
        $csp = SecurityHeaders::headers(apiJson: true)['Content-Security-Policy'];

        self::assertStringContainsString("default-src 'none'", $csp);
        self::assertStringContainsString("frame-ancestors 'none'", $csp);
    }
}
