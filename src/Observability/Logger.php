<?php

declare(strict_types=1);

namespace WeDrive\Observability;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger as MonologLogger;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Structured JSON logging for WeDrive.
 *
 * Wraps Monolog to emit one JSON object per line on stderr (the 12-factor /
 * container-friendly target — Docker, Railway, etc. collect stderr). Each record
 * carries a per-request correlation id so logs can be grouped across the
 * legacy hand-rolled pages.
 *
 * Monolog is an optional dependency: if it is not installed the factory returns a
 * PSR-3 NullLogger so the app keeps running. Install with:
 *   composer require monolog/monolog
 */
final class Logger
{
    private static ?LoggerInterface $instance = null;
    private static ?string $requestId = null;

    /**
     * Shared application logger (lazily built).
     */
    public static function get(): LoggerInterface
    {
        if (self::$instance instanceof LoggerInterface) {
            return self::$instance;
        }

        if (!class_exists(MonologLogger::class)) {
            return self::$instance = new NullLogger();
        }

        $level = self::resolveLevel();
        $handler = new StreamHandler('php://stderr', $level);
        $handler->setFormatter(new JsonFormatter());

        $logger = new MonologLogger('wedrive');
        $logger->pushHandler($handler);
        $logger->pushProcessor(static function (array $record): array {
            $record['extra']['request_id'] = self::requestId();
            $record['extra']['service'] = 'wedrive';
            return $record;
        });

        return self::$instance = $logger;
    }

    /**
     * Stable per-request correlation id (reused across all log lines in one
     * request). Honours an inbound `X-Request-Id` header when present.
     */
    public static function requestId(): string
    {
        if (self::$requestId !== null) {
            return self::$requestId;
        }

        $inbound = $_SERVER['HTTP_X_REQUEST_ID'] ?? '';
        if (is_string($inbound) && preg_match('/^[A-Za-z0-9._-]{8,128}$/', $inbound) === 1) {
            return self::$requestId = $inbound;
        }

        return self::$requestId = bin2hex(random_bytes(8));
    }

    /** Inject a logger (tests). */
    public static function set(LoggerInterface $logger): void
    {
        self::$instance = $logger;
    }

    public static function reset(): void
    {
        self::$instance = null;
        self::$requestId = null;
    }

    private static function resolveLevel(): Level
    {
        $name = strtolower((string) ($_ENV['LOG_LEVEL'] ?? getenv('LOG_LEVEL') ?: 'info'));

        return match ($name) {
            'debug'            => Level::Debug,
            'notice'           => Level::Notice,
            'warning', 'warn'  => Level::Warning,
            'error'            => Level::Error,
            'critical'         => Level::Critical,
            default            => Level::Info,
        };
    }
}
