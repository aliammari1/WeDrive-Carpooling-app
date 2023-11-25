<?php
require_once __DIR__ . '\..\..\Model\Reservations\paiements.php';
require_once __DIR__ . '\..\..\Model\Reservations\paiement.php';

$paiements = new paiements();
$paiementsArray = $paiements->showPaiement();

$id_p = $_GET['id_p'] ?? null;
if ($id_p !== null) {
    $paiements->deletePaiement($id_p);
    header('Location: ../../View/pages/back/paiement.php');
}

$id_p = $_POST['id_p'] ?? null;

if ($id_p !== null) {
    $paiement = new paiement($_POST);
    $paiements->updatePaiement($paiement);
    header('Location:../../View/pages/back/paiement.php');
}

?>