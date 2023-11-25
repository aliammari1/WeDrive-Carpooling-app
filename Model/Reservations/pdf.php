<?php
require_once __DIR__ . '\..\..\View\vendor\autoload.php';

use Fpdf\Fpdf;

class PDF extends FPDF
{
    // Chargement des données
    function LoadData($data)
    {
        $result = array();
        for ($i = 0; $i < (count($data) / 2); $i++) {
            $result[$i] = $data[$i];
        }
        return $result;
    }

    // Tableau simple
    function BasicTable($header, $data)
    {
        // En-tête
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln(); // Données
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }

    // Tableau amélioré
    function ImprovedTable($header, $data)
    {
        // Largeurs des colonnes
        $w = array(40, 35, 45, 40);
        // En-tête
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Données
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR');
            $this->Cell($w[1], 6, $row[1], 'LR');
            $this->Cell($w[2], 6, number_format($row[2], 0, ',', ' '), 'LR', 0, 'R');
            $this->Cell($w[3], 6, number_format($row[3], 0, ',', ' '), 'LR', 0, 'R');
            $this->Ln();
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Tableau coloré
    function FancyTable($header, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // En-tête
        // $w = array(40, 35, 45, 40);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($i === count($header) - 1 ? 50 : 30, 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Données
        $fill = false;
        $i = 0;
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell($i === count($row) - 1 ? 50 : 30, 6, $col, 'LR', 0, 'L', $fill);
                $i++;
            }
            $i = 0;
            $this->Ln();
            $fill = !$fill;
        }

        // Trait de terminaison
        // $this->Cell(array_sum(), 0, '', 'T');
    }
}