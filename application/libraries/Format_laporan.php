<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . '/third_party/FPDF/fpdf.php';
class Format_laporan extends FPDF
{
    public $pdf;
    function __construct($orientation = 'L', $unit = 'mm', $size = 'A4')
    {
        parent::__construct($orientation, $unit, $size);
        $this->pdf = $this;
    }

    function Header()
    {
        global $provinsi;

        $identitas = 'PROVINSI ' . $provinsi;
        $deskripsi = "Tahun " . date('Y');

        $this->pdf->Cell(123);
        $this->pdf->SetFont('Arial', 'B', 15);
        $this->pdf->Cell(45, 10, 'DATA PERANTAU MINANG SE INDONESIA', 0, 1, 'C');
        $this->pdf->Cell(123);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(45, 1, $identitas, 0, 1, 'C');
        $this->pdf->Cell(123);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(45, 10, $deskripsi, 0, 1, 'C');
        $this->pdf->SetLineWidth(1);

        $this->pdf->Line(5, 26, 292, 26); //5,26,292,26
        $this->pdf->SetLineWidth(0);
        $this->pdf->Line(5, 27, 292, 27); //5,27,292,27
        $this->pdf->Ln(5);
    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->pdf->SetY(-22);
        // Print current and total page numbers
        $this->pdf->AliasNbPages();
    }

    function MultiAlignCell($w, $h, $text, $border = 0, $ln = 0, $align = 'L', $fill = false)
    {
        // Store reset values for (x,y) positions
        $x = $this->GetX() + $w;
        $y = $this->GetY();

        // Make a call to FPDF's MultiCell
        $this->MultiCell($w, $h, $text, $border, $align, $fill);

        // Reset the line position to the right, like in Cell
        if ($ln == 0) {
            $this->SetXY($x, $y);
        }
    }
}
