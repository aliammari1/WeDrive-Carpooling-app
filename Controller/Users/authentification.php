<?php

try {
    session_start();
    if (!isset($_SESSION['authentification']) || $_SESSION['authentification'] !== true) {
        header('Location: ' . __DIR__ . '\front\login.php');
        exit;
    }
} catch (Throwable $e) {
    echo $e->getMessage();
}
