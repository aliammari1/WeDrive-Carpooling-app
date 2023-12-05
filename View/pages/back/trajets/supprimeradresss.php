<?php
require_once '../../../../Controller/trajets/adressC.php';
$trajectC = new adressC();
$trajectC->Supprimeradress($_GET["adressid"]);
header('Location:Afficheradresss.php');
