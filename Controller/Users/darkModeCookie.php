<?php


try {
    if (isset($_GET['dark'])) {
        if ($_GET['dark'] == 'on') {
            setcookie('darkMode', '1', time() + (10 * 365 * 24 * 60 * 60), '/');
        } else {
            setcookie('darkMode', '0', time() + (10 * 365 * 24 * 60 * 60), '/');
        }
    }

    // Check if the user has a dark mode preference stored in a cookie
    if (isset($_COOKIE['darkMode'])) {
        $darkModeEnabled = $_COOKIE['darkMode'];
        if ($darkModeEnabled) {
            echo 'dark';
        }
    }
} catch (Throwable $e) {
    echo $e->getMessage();
}
