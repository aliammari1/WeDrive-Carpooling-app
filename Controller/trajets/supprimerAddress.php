<?php
require_once __DIR__ . "/../../Model/trajets/addressC.php";
$trajetC = new addressC();
$trajetC->Supprimeraddress($_GET["addressid"]);
header('Location: /../../View/pages/back/trajets/Afficheraddress.php');
