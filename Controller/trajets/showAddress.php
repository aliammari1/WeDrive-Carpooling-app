<?php
require_once __DIR__ . "/../../Model/trajets/addressC.php";

$adressC = new adressC();
$listeadress = $adressC->Afficheradress();
if (isset($_POST['chearch'])) :
    $listeadress = $adressC->search($_POST['chearch']);
endif;
if (isset($_POST['valeur'])) :
    $listeadress = $adressC->Afficheradresstri($_POST['valeur'], $_POST['order']);
endif;
