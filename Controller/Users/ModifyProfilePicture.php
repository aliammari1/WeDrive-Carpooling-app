<?php


require_once __DIR__ . '\..\..\Model\Users\users.php';
$users = new users();
$users->updateUserProfilePicture($_FILES["profileImage"]["tmp_name"]);
