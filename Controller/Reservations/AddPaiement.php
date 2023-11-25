<?php
require_once '../Model/paiements.php';
require_once '../Model/paiement.php';

$id_reserv = $_POST['id_reserv'];
$date = $_POST['date'];
$prix = $_POST['prix'];

if ( isset($id_reserv) && isset($date) && isset($prix)) {
    $paiements = new paiements();
    $paiement = new paiement([
        'id_reserv' => $id_reserv,
        'date' => $date,
        'prix' => $prix
    ]);
    $paiements->addpaiement($paiement);
    header('Location: ../View/pages/back/paiement.php');
}

?>