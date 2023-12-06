<?php
require_once __DIR__ . '/../../Model/trajets/trajetC.php';
$trajetC = new trajetC();
$trajetC->Supprimertraject($_GET["idtrajet"]);
header('Location: /../../View/pages/back/trajets/Affichertrajets.php');
