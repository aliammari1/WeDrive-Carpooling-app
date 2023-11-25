<?php

require_once __DIR__ . '\..\..\Model\Users\users.php';
try {
    $users = new users();
    $pageUser = isset($_GET['pageUser']) ? $_GET['pageUser'] : 0;
    $sizeUser =  isset($_GET['sizeUser']) ? $_GET['sizeUser'] : 5;
    $pageAdmin = isset($_GET['pageAdmin']) ? $_GET['pageAdmin'] : 0;
    $sizeAdmin =  isset($_GET['sizeAdmin']) ? $_GET['sizeAdmin'] : 5;
    $pageConducteur = isset($_GET['pageConducteur']) ? $_GET['pageConducteur'] : 0;
    $sizeConducteur =  isset($_GET['sizeConducteur']) ? $_GET['sizeConducteur'] : 5;
    $pagePassager = isset($_GET['pagePassager']) ? $_GET['pagePassager'] : 0;
    $sizePassager =  isset($_GET['sizePassager']) ? $_GET['sizePassager'] : 5;
    $usersTable = $users->showUsers($pageUser, $sizeUser);
    $adminsTable = $users->showAdmins($pageAdmin, $sizeAdmin);
    $conducteursTable = $users->showConducteurs($pageConducteur, $sizeConducteur);
    $passagersTable = $users->showPassagers($pagePassager, $sizePassager);
    $labelList = [
        "admin",
        "passager",
        "conducteur"
    ];
    $Rolenumbers = [];
    $Rolenumbers[0] = 0;
    for ($i = 0; $i < 3; $i++) {
        $Rolenumbers[$i + 1] = $users->getRoleNumber($labelList[$i]);
        $Rolenumbers[0] += $Rolenumbers[$i + 1];
    }

    // var_dump($usersTable);
?>
<?php
} catch (Throwable $e) {
    echo $e->getMessage();
}
?>