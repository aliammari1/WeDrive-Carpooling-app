<?php
require_once '../../Model/Reservations/reservations.php';
require_once '../../Model/Reservations/reservation.php';
require_once 'mail.php';
$animal = $_POST['animal'];
$nb_place_vide = $_POST['nb_place_vide'];
$mode_paiement = $_POST['mode_paiement'];
$date_meet = $_POST['date_meet'];

if (isset($animal) && isset($nb_place_vide) && isset($mode_paiement) && isset($date_meet)) {
    $reservations = new reservations();

    $reservation = new reservation([
        'animal' => $animal,
        'nb_place_vide' => $nb_place_vide,
        'mode_paiement' => $mode_paiement,
        'date_meet' => $date_meet
    ]);
    $reservations->addReservation([
        'animal' => $animal,
        'nb_place_vide' => $nb_place_vide,
        'mode_paiement' => $mode_paiement,
        'date_meet' => $date_meet
    ]);
    sendMail($date_meet);
    header('Location: ../../View/pages/back/reservation.php');
}

?>