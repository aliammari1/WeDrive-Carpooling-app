<?php
require_once __DIR__ . '\..\..\Model\Reservations\reservations.php';
require_once __DIR__ . '\..\..\Model\pdf.php';
$reservations = new reservations();
$data = $reservations->pdf();
$pdf = new PDF();
// Column headings
$header = array('animal', 'nb_valize', 'mode_paiement', 'nb_place_vide', 'date_meet');
// Data loading
$data = $pdf->LoadData($data);
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
/*$pdf->BasicTable($header, $data);
$pdf->AddPage();
$pdf->ImprovedTable($header, $data);
$pdf->AddPage();*/
$pdf->FancyTable($header, $data);
$pdf->Output("reservations.pdf", "D");
?>