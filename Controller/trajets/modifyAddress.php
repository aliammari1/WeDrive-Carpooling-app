<?php
require_once __DIR__ . "/../../Model/trajets/addressC.php";

$error = "";

// create user
$address = null;

// create an instance of the controller
$addressC = new addressC();

# var_dump($_POST);

if (
    isset($_POST['addressid']) &&
    isset($_POST["addressA"]) &&
    isset($_POST["addressB"]) &&
    isset($_POST["type"])
) {
    if (
        !empty($_POST['addressid']) &&
        !empty($_POST["addressA"]) &&
        !empty($_POST["addressB"]) &&
        !empty($_POST["type"])

    ) {
        $address = new address(
            $_POST['addressA'],
            $_POST['addressB'],
            $_POST['type'],
            $_POST['addressid']
        );
        $addressC->Modifieraddress($address, $_POST['addressid']);
        header('Location:Afficheraddress.php');
    } else
        $error = "Missing information";
}
