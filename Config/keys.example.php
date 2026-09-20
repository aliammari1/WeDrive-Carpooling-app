<?php

/**
 * API key configuration (EXAMPLE / template).
 *
 * Copy this file to `Config/keys.php` (which is git-ignored) and fill in real
 * values, OR — preferably — set the corresponding environment variables
 * (e.g. in your web server, container, or a git-ignored .env file). Values
 * fall back to environment variables first, then to the placeholder below.
 *
 * Usage from a View file:
 *   <?php $keys = require __DIR__ . '/../Config/keys.php'; ?>
 *   ...key=<?= htmlspecialchars($keys['GOOGLE_MAPS_API_KEY'], ENT_QUOTES) ?>...
 */

return [
    // Google Maps JavaScript API key.
    // Get one at https://console.cloud.google.com/google/maps-apis
    'GOOGLE_MAPS_API_KEY' => getenv('GOOGLE_MAPS_API_KEY') ?: 'CHANGE_ME',
];
