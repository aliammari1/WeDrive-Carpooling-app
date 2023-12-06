<?php
require_once __DIR__ . "/../../Model/trajets/addressC.php";

$addressC = new addressC();
$listeaddress = $addressC->Afficheraddress();
if (isset($_POST['search'])) :
    $listeaddress = $addressC->search($_POST['search']);
endif;
if (isset($_POST['valeur'])) :
    $listeaddress = $addressC->Afficheraddresstri($_POST['valeur'], $_POST['order']);
endif;

/*
    if(isset($_POST['search'])):
    $listeaddress=$addressC->search($_POST['search']);
    endif;
   // var_dump($_POST['search']);
*/
