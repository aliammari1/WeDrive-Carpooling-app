<?php
require_once __DIR__ . "/../../Model/trajets/trajetC.php";

$trajetC = new trajetC();
$listetrajet = $trajetC->Affichertraject();
