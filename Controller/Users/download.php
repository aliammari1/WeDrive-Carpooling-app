<?php
require_once __DIR__ . "\..\..\Model\Users\users.php";

if (isset($_Get['id_user'])) {
    $users = new users();
    $image_data = $users->getProfilePictureById(232);
    header('Content-Type: image/jpeg');
    header('Content-Disposition: attachment; filename="image.jpg"');
    echo $image_data;
}
