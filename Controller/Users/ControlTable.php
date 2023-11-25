<?php

require_once __DIR__ . '\..\..\Model\Users\users.php';
try {
    $users = new users();


    $id_user = $_GET['id_user'] ?? null;
    if ($id_user !== null) {
        $users->deleteUsers($id_user);
        header("Location: ../../../View/pages/back/tables.php");
    }

    $id_user = $_POST['id_user'] ?? null;
    if ($id_user !== null) {
        $users->updateUsers($_POST);
        header("Location: ../../../View/pages/back/tables.php");
    }
    print_r($_POST);
} catch (Throwable $e) {
    echo $e->getMessage();
}
