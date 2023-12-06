<?php

require_once __DIR__ . "/../../Model/trajets/trajetC.php";
require_once __DIR__ . "/../../Model/trajets/trajet.php";

function Afficherconducteur()
{
    $sql = "SELECT id_conducteur FROM conducteurs";
    $connection = new connection();
    $db = $connection->getDb();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur:' . $e->getMessage());
    }
}


$error = "";

// create user
$trajets = null;

// create an instance of the controller
$trajetC = new trajetC();
$listeconducteur = Afficherconducteur();
if (
    isset($_POST["idConducteur"]) &&
    isset($_POST["lien_depar_arriver"]) &&
    isset($_POST["tarif"]) &&
    isset($_POST["Date_D"]) &&
    isset($_POST["img"])
) {
    if (
        !empty($_POST['idConducteur']) &&
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
        );
        $trajetC->Ajoutertraject($trajets);
        header('Location:Affichertrajets.php');
    } else
        $error = "Missing information";
}
