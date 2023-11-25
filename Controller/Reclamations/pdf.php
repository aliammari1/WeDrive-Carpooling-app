<?php
require_once  __DIR__ . '\..\..\Model\pdf.php';
require_once  __DIR__ . '\..\..\Model\Reclamations\reclamations.php';
$reclamation = new reclamations();
$file = $_GET["file"] . ".pdf";
$pdf = new PDF();
// Titres des colonnes
$header = array('id_rec', 'nom', 'date', 'description');
$data = $reclamation->displayforPDF();
// var_dump($data);
$result = $pdf->LoadData($data);
// var_dump($result);

// Chargement des données
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
// $pdf->BasicTable($header, $data);
// $pdf->AddPage();
// $pdf->ImprovedTable($header, $data);
// $pdf->AddPage();
$pdf->FancyTable($header, $result);

$pdf->Output($file, 'D', true);
