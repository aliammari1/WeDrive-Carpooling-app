<?php

require_once __DIR__ . "/../../Model/trajets/addressC.php";
require_once __DIR__ . "/../../Model/trajets/address.php";

$error = "";

// create user
$address = null;

// create an instance of the controller
$addressC = new addressC();


if (
    isset($_POST["addressA"]) &&
    isset($_POST["addressB"]) &&
    isset($_POST["type"])

) {
    if (
        !empty($_POST['addressA']) &&
        !empty($_POST["addressB"]) &&
        !empty($_POST["type"])

    ) {
        $address = new address(
            $_POST['addressA'],
            $_POST['addressB'],
            $_POST['type']

        );

        $addressC->Ajouteraddress($address);
        header('Location:Afficheraddress.php');
    } else
        $error = "Missing information";
}
