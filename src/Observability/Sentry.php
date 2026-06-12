<?php

declare(strict_types=1);

namespace WeDrive\Observability;

/**
 * Optional Sentry error tracking.
 *
 * Initialises the Sentry PHP SDK when a `SENTRY_DSN` is configured AND the SDK
 * is installed. Everything is a no-op otherwise, so the app runs unchanged with
 * no DSN and even without the dependency present (it is an optional require).
 *
 * Install with:
 *   composer require sentry/sentry
 */
final class Sentry
{
    private static bool $initialised = false;

    /**
     * Initialise Sentry once. Safe to call on every request / front-controller
     * boot; subsequent calls are ignored.
     */
    public static function init(): void
    {
        if (self::$initialised) {
            return;
        }
        self::$initialised = true;

        $dsn = (string) ($_ENV['SENTRY_DSN'] ?? getenv('SENTRY_DSN') ?: '');
        if ($dsn === '' || !\function_exists('\Sentry\init')) {
            return;
        }

        $environment = (string) ($_ENV['APP_ENV'] ?? getenv('APP_ENV') ?: 'production');
        $tracesRaw = $_ENV['SENTRY_TRACES_SAMPLE_RATE'] ?? getenv('SENTRY_TRACES_SAMPLE_RATE');
        $traces = is_numeric($tracesRaw) ? (float) $tracesRaw : 0.0;

        \Sentry\init([
            'dsn'                  => $dsn,
            'environment'          => $environment,
            'traces_sample_rate'   => $traces,
            'send_default_pii'     => false,
            // Tie Sentry events to the same correlation id used by the logger.
            'before_send'          => static function ($event) {
                if (\method_exists($event, 'setTag')) {
                    $event->setTag('request_id', Logger::requestId());
                }
                return $event;
            },
        ]);
    }

    /**
     * Capture a throwable if Sentry is active; always a no-op-safe call.
     */
    public static function capture(\Throwable $e): void
    {
        if (\function_exists('\Sentry\captureException')) {
            \Sentry\captureException($e);
        }
    }
}
