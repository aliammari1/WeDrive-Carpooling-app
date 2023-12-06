<?php
require_once __DIR__ . "/../../Model/trajets/trajetC.php";

$error = "";

// create user
$trajets = null;

// create an instance of the controller
$trajetC = new trajetC();
if (
    isset($_POST['idtrajet']) &&
    isset($_POST["idConducteur"]) &&
    isset($_POST["lien_depar_arriver"]) &&
    isset($_POST["tarif"]) &&
    isset($_POST["Date_D"]) &&
    isset($_POST["img"])
) {
    if (
        !empty($_POST['idtrajet']) &&
        !empty($_POST["idConducteur"]) &&
        !empty($_POST["lien_depar_arriver"]) &&
        !empty($_POST["tarif"]) &&
        !empty($_POST["Date_D"]) &&
        !empty($_POST["img"])
    ) {
        $trajets = new trajet(
            $_POST['idConducteur'],
            $_POST['lien_depar_arriver'],
            $_POST['tarif'],
            $_POST['Date_D'],
            $_POST['img'],
            $_POST['idtrajet']
        );
        $trajetC->Modifiertraject($trajets, $_POST['idtrajet']);
        header('Location:Affichertrajets.php');
    } else
        $error = "Missing information";
}
