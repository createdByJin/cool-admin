<?php

include("FPDF/fpdf.php");
include("pdfCategorias.php");

$categorias = getPdfCategoria();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190,10,utf8_decode('Relatório de Categorias'), 0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(20, 7, utf8_decode("Código"),1,0,"C");
$pdf->Cell(170, 7, utf8_decode("Descrição"),1,0,"C");
$pdf->Ln();

foreach ($categorias as $categoria){
    $pdf->Cell(20, 7, $categoria["id_categoria"],1,0,"C");
    $pdf->Cell(170, 7, utf8_decode($categoria["descricao"]),1,0,"C");
    $pdf->Ln();
}

$pdf->Output();

