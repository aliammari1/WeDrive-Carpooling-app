<?php

// The Reservations module historically shipped its own copy of the `connection`
// class with hardcoded credentials. It now reuses the single, env-driven
// connection defined in Model/connection.php (backed by WeDrive\Database).
require_once __DIR__ . '/../connection.php';
