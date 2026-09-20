<?php

declare(strict_types=1);

namespace WeDrive;

use WeDrive\Observability\Logger;
use WeDrive\Observability\Sentry;

/**
 * Front-controller / page bootstrap.
 *
 * The legacy MVC has no single entry point, so this consolidates the
 * cross-cutting boot steps any request should run:
 *   - load `.env`
 *   - initialise structured JSON logging (Monolog) + a request id
 *   - initialise Sentry error tracking (no-op without SENTRY_DSN / SDK)
 *   - register an exception/error handler that logs + reports, then rethrows
 *
 * Include once at the top of a page or endpoint:
 *   require_once __DIR__ . '/../vendor/autoload.php';
 *   \WeDrive\Bootstrap::init();
 */
final class Bootstrap
{
    private static bool $booted = false;

    public static function init(): void
    {
        if (self::$booted) {
            return;
        }
        self::$booted = true;

        self::loadEnv();
        Sentry::init();

        // Establish the correlation id up front and echo it back to clients so
        // a user-reported error can be traced to its log line.
        $requestId = Logger::requestId();
        if (!headers_sent() && \PHP_SAPI !== 'cli') {
            header('X-Request-Id: ' . $requestId);
        }

        set_exception_handler(static function (\Throwable $e): void {
            Logger::get()->error('uncaught_exception', [
                'exception' => $e::class,
                'message'   => $e->getMessage(),
                'file'      => $e->getFile(),
                'line'      => $e->getLine(),
            ]);
            Sentry::capture($e);
        });
    }

    /** Load the project `.env` once, if both the SDK and file are present. */
    private static function loadEnv(): void
    {
        $root = \dirname(__DIR__);
        if (class_exists(\Dotenv\Dotenv::class) && is_file($root . '/.env')) {
            \Dotenv\Dotenv::createImmutable($root)->safeLoad();
        }
    }

    public static function reset(): void
    {
        self::$booted = false;
    }
}
