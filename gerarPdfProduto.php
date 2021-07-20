<?php

include("FPDF/fpdf.php");
include("pdfProdutos.php");

$produtos = getPdf();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190,10,utf8_decode('Relatório de Produtos'), 0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(20, 7, utf8_decode("Código"),1,0,"C");
$pdf->Cell(100, 7, utf8_decode("Descrição"),1,0,"C");
$pdf->Cell(50, 7, utf8_decode("Categoria"),1,0,"C");
$pdf->Cell(20, 7, utf8_decode("Quantidade"),1,0,"C");
$pdf->Ln();

foreach ($produtos as $produto){
    $pdf->Cell(20, 7, $produto["id_produto"],1,0,"C");
    $pdf->Cell(100, 7, utf8_decode($produto["descricao"]),1,0,"C");
    $pdf->Cell(50, 7, utf8_decode($produto["categoria"]),1,0,"C");
    $pdf->Cell(20, 7, $produto["quantidade"],1,0,"C");
    $pdf->Ln();
}

$pdf->Output();

