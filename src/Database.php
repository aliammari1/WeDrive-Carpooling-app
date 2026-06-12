<?php

declare(strict_types=1);

namespace WeDrive;

use PDO;
use PDOException;
use RuntimeException;

/**
 * Single, injectable PDO factory for WeDrive.
 *
 * Replaces the 15+ hardcoded `new PDO('mysql:host=localhost;dbname=...','root','')`
 * calls scattered across the legacy Model/ and View/ layers. Credentials are read
 * from the environment (loaded from a `.env` file via vlucas/phpdotenv) so that no
 * secret ever lives in source control.
 *
 * Usage:
 *   $pdo = \WeDrive\Database::pdo();
 *
 * Tests can inject an in-memory / disposable connection:
 *   \WeDrive\Database::set(new PDO('sqlite::memory:'));
 */
final class Database
{
    private static ?PDO $instance = null;

    /** Prevent instantiation — this is a static factory. */
    private function __construct()
    {
    }

    /**
     * Return the shared PDO connection, creating it on first use.
     */
    public static function pdo(): PDO
    {
        if (self::$instance instanceof PDO) {
            return self::$instance;
        }

        self::loadEnv();

        $host    = self::env('DB_HOST', '127.0.0.1');
        $port    = self::env('DB_PORT', '3306');
        $name    = self::env('DB_NAME', 'wedrive');
        $charset = self::env('DB_CHARSET', 'utf8mb4');
        $user    = self::env('DB_USER', 'root');
        $pass    = self::env('DB_PASSWORD', '');

        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $host,
            $port,
            $name,
            $charset
        );

        try {
            self::$instance = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            // Re-throw without leaking credentials to output (the legacy code
            // echoed $e->getMessage() directly, which exposed the DSN).
            throw new RuntimeException('Database connection failed.', 0, $e);
        }

        return self::$instance;
    }

    /**
     * Inject an arbitrary PDO instance. Primarily for tests (e.g. an in-memory
     * SQLite database) so the auth/reservation logic can be exercised without a
     * live MySQL server.
     */
    public static function set(PDO $pdo): void
    {
        self::$instance = $pdo;
    }

    /**
     * Reset the cached connection (useful between test cases).
     */
    public static function reset(): void
    {
        self::$instance = null;
    }

    /**
     * Load the project `.env` once, if present. Missing file is non-fatal so the
     * app can also be configured purely through real environment variables
     * (e.g. Docker / CI), which is the recommended production setup.
     */
    private static function loadEnv(): void
    {
        $root = \dirname(__DIR__);
        $autoload = $root . '/vendor/autoload.php';

        if (
            class_exists(\Dotenv\Dotenv::class) === false
            && is_file($autoload)
        ) {
            require_once $autoload;
        }

        if (class_exists(\Dotenv\Dotenv::class) && is_file($root . '/.env')) {
            \Dotenv\Dotenv::createImmutable($root)->safeLoad();
        }
    }

    /**
     * Read an environment value from $_ENV, $_SERVER or getenv(), falling back
     * to a default. Centralised so every reader behaves identically.
     */
    private static function env(string $key, string $default): string
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);

        if ($value === false || $value === null || $value === '') {
            return $default;
        }

        return (string) $value;
    }
}
