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
        require_once __DIR__ . '/../../View/vendor/autoload.php';
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $listed = $dotenv->load();
        $_SESSION['authentification'] = true;
        switch ($user->getRole()) {
            case "admin":
                $admin = new admin($user);
                $_SESSION['user'] = serialize($user);
                break;
            case "conducteur":
                $conducteur = new conducteur($user, $modeleVoiture, $nbPlaces);
                $_SESSION['user'] = serialize($conducteur);
                break;
            case "passager":
                $passager = new passager($user);
                $_SESSION['user'] = serialize($passager);
                break;
        }

        header("Location: ../../View/pages/back/Users/dashboard.php");
    }
} catch (Throwable $e) {
    echo $e->getMessage();
}
