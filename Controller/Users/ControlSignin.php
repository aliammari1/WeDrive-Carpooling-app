<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/sanitize.php";

use WeDrive\Bootstrap;
use WeDrive\Http\RateLimiter;
use WeDrive\Http\SecurityHeaders;
use WeDrive\Observability\Logger;

Bootstrap::init();
SecurityHeaders::send();

// Brute-force throttle: 5 login attempts / 5 min / IP. Fail closed with a 429
// so credential-stuffing can't hammer password_verify().
$loginLimiter = new RateLimiter('login', limit: 5, windowSeconds: 300);
$loginState = $loginLimiter->hit(RateLimiter::clientIp());
if (!$loginState->allowed()) {
    $loginLimiter->sendRetryAfter($loginState->resetInSeconds);
    Logger::get()->warning('login_rate_limited', ['ip' => RateLimiter::clientIp()]);
    header('Location: ../../View/pages/front/login.php?error=throttled');
    exit;
}

try {
    $data = sanitize_login($_POST);
    if (!empty($data)) {
        require_once "../../Model/Users/admin.php";
        require_once "../../Model/Users/conducteur.php";
        require_once "../../Model/Users/passager.php";
        require_once "../../Model/Users/users.php";
        session_start();
        $users = new users();
        $user = $users->getUser($data['email']);
        // SECURITY: verify the submitted password against the stored hash.
        // Previously the password was never checked, so any password for an
        // existing email logged in successfully.
        if ($user === null || !password_verify($data['password'], $user->getPassword())) {
            Logger::get()->warning('login_failed', [
                'email_present' => $user !== null,
                'ip'            => RateLimiter::clientIp(),
            ]);
            header("Location: ../../View/pages/front/login.php?error=invalid");
            exit;
        }
        $_SESSION['authentification'] = true;
        Logger::get()->info('login_success', ['role' => $user->getRole()]);
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
