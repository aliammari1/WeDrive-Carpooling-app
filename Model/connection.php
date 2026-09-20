<?php

// Bridge the legacy global `connection` class onto the injectable, env-driven
// WeDrive\Database factory. Credentials are no longer hardcoded here — they are
// read from `.env` / environment variables. See src/Database.php and .env.example.

$__wedrive_autoload = __DIR__ . '/../vendor/autoload.php';
if (is_file($__wedrive_autoload)) {
    require_once $__wedrive_autoload;
}

if (!class_exists('connection')) {
    class connection
    {
        private $db;

        public function __construct()
        {
            try {
                $this->db = \WeDrive\Database::pdo();
            } catch (\Throwable $e) {
                // Preserve legacy non-fatal behaviour, but never leak the DSN.
                error_log('WeDrive DB connection error: ' . $e->getMessage());
            }
        }

        public function __destruct()
        {
            // The PDO instance is shared via WeDrive\Database; do not unset it.
        }

        public function getDb()
        {
            return $this->db;
        }

        // Legacy alias used by some Reservations models.
        public function get_db()
        {
            return $this->db;
        }
    }
}
