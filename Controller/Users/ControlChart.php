<?php
require_once "../../Model/Users/users.php";
$users = new users();
$labelList = [
    "admin",
    "passager",
    "conducteur"
];
$Rolenumbers = [];
for ($i = 0; $i < 3; $i++)
    $Rolenumbers[$i] = $users->getRoleNumber($labelList[$i]);
header('Content-Type: application/json');
echo json_encode($Rolenumbers);
