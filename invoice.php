<?php
session_start();
require('api/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 20, 'LOGO', 1, 0, 'C');

$pdf->Cell(150, 20, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'BILL FROM:', 0, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(70, 6, 'BRITTA INTERNATIONAL APARTMENTS
Sea View
Dar es Salaam, Dar es Salaam
Tanzania
ass@dsd.com', 0, 'L');

$pdf->SetLineWidth(0.7);
$pdf->SetDrawColor(208, 208, 208);
$pdf->Line(10, 75, 200, 75);

$pdf->SetY(80);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'BILL TO:', 0, 'L');
$pdf->SetY(83);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(60, 6, '
Suluman Tagwan
Kinondoni Dar es Salaam 
Dar es Salaam, Dar es Salaam
Tanzania
su@tagwa.net', 0, 'L');

$pdf->SetY(82);
$pdf->SetX(-70);
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(40, 6, 'INVOICE:
INVOICE DATE:', 0, 'L');

$pdf->SetY(82);
$pdf->SetX(-50);
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(40, 6, '# 0001
2024-10-22', 0, 'R');

$pdf->SetY(95);
$pdf->SetX(-70);
$pdf->SetFillColor(208, 208, 208);
$pdf->Cell(30, 8, 'AMOUNT DUE:', 0, 0, 'L', $fill = true);
$pdf->Cell(30, 8, '$452,000.00', 0, 0, 'R', $fill = true);

$pdf->Output();
