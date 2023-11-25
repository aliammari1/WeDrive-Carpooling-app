<?php

try {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../View/index.php");
} catch (Throwable $e) {
    echo $e->getMessage();
}
