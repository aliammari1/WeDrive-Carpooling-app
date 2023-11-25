<?php

require_once __DIR__ . "\sanitize.php";
try {
    $data = sanitize_user($_POST);
    require_once "../../Model/Users/admin.php";
    require_once "../../Model/Users/conducteur.php";
    require_once "../../Model/Users/passager.php";
    require_once "../../Model/Users/users.php";
    session_start();
    $users = new users();
    $user = $users->addUser($data);
    $_SESSION['id_user'] = $user->getId();
    $_SESSION['authentification'] = true;
    switch ($user->getRole()) {
        case "admin":
            $admin = new admin($user);
            $users->addAdmin($admin);
            $_SESSION['user'] = serialize($admin);
            header("Location: ../../View/pages/back/dashboard.php");
            break;
        case "conducteur":
            $conducteur = new conducteur($user, $data["modeleVoiture"], $data["nbPlaces"]);
            $users->addConducteur($conducteur);
            $_SESSION['user'] = serialize($conducteur);
            header("Location: ../../View/pages/back/dashboard.php");
            break;
        case "passager":
            $passager = new passager($user);
            $users->addPassager($passager);
            $_SESSION['user'] = serialize($passager);
            header("Location: ../../View/pages/back/dashboard.php");
            break;
    }
    unset($users);
} catch (Throwable $e) {
    echo $e->getMessage();
}
