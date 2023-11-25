<?php
require_once __DIR__ . '\..\..\Model\Reservations\reservations.php';
require_once __DIR__ . '\..\..\Model\Reservations\reservation.php';

$reservations = new reservations();
$reservationsArray = $reservations->showReservations();

$id_reserv = $_GET['id_reserv'] ?? null;
if ($id_reserv !== null) {
    $reservations = new reservations();
    $reservations->deleteReservation($id_reserv);
    header('Location: ../../View/pages/back/reservation.php');
}

$id_reserv = $_POST['id_reserv'] ?? null;

if ($id_reserv !== null) {
    $reservations = new reservations();
    $reservations->updateReservation($_POST);
    header('Location:../../View/pages/back/reservation.php');
}

?>