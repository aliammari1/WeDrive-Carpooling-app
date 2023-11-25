<?php
$email = $_GET['email'] ?? null;
if (isset($email)) {
    echo 'success';
} else {
    echo 'failure';
}
