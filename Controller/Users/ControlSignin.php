<?php

require_once __DIR__ . "\sanitize.php";
try {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $data = sanitize_login($_POST);
    var_dump($data);
    if (!empty($data)) {
        require_once "../../Model/Users/admin.php";
        require_once "../../Model/Users/conducteur.php";
        require_once "../../Model/Users/passager.php";
        require_once "../../Model/Users/users.php";
        session_start();
        $users = new users();
        $user = $users->getUser($data['email'] /*, $data['password']*/);
        if ($user === null) {
            header("Location: ../../View/pages/front/login.php");
            exit;
        }
        $_SESSION['authentification'] = true;
        switch ($user->getRole()) {
            case "admin":
                $admin = new admin($user);
                $_SESSION['user'] = serialize($user);
                header("Location: ../../View/pages/back/dashboard.php");
                break;
            case "conducteur":
                $conducteur = new conducteur($user, $modeleVoiture, $nbPlaces);
                $_SESSION['user'] = serialize($conducteur);
                header("Location: ../../View/pages/back/dashboard.php");
                break;
            case "passager":
                $passager = new passager($user);
                $_SESSION['user'] = serialize($passager);
                header("Location: ../../View/pages/back/dashboard.php");
                break;
        }
    }
} catch (Throwable $e) {
    echo $e->getMessage();
}
