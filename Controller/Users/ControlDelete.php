<?php
require_once __DIR__ . '\..\..\Model\Users\users.php';
$id_user = $_GET['id_user'] ?? null;
if ($id_user !== null) {
    $users = new users();
    echo "success";
    switch ($users->getUserRoleByID($id_user)) {
        case "admin":
            require_once __DIR__ . '\..\..\Model\Users\admin.php';
            $admin = new admin($users->getUserByID($id_user));
            $users->deleteAdmin($id_user);
            break;
        case "passager":
            require_once __DIR__ . '\..\..\Model\Users\passager.php';
            $passager = new Passager($users->getUserByID($id_user));
            $users->deletePassager($id_user);
            break;
        case "conducteur":
            require_once __DIR__ . '\..\..\Model\Users\conducteur.php';
            $conducteur = new conducteur($users->getUserByID($id_user));
            $users->deleteConducteur($id_user);
            break;
    }
    $users->deleteUsers($id_user);
    echo "success";
}
