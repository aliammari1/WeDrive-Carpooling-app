<?php

try {
    session_start();
    if (!isset($_SESSION['authentification']) || $_SESSION['authentification'] !== true) {
        header('Location: login.php');
        exit;
    }
} catch (Throwable $e) {
    echo $e->getMessage();
}
