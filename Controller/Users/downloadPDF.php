<?php
require_once__DIR__ . "\..\..\Model\pdf.php";
require_once__DIR__ . "\..\..\Model\Users\users.php";
$pdf = new PDF();
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->BasicTable($header, $data);
$pdf->AddPage();
$pdf->ImprovedTable($header, $data);
$pdf->AddPage();
$pdf->FancyTable($header, $data);
$pdf->Output("files.pdf", 'D');
