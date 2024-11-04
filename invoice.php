<?php
session_start();
require('api/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 20, 'LOGO', 1, 0, 'C');

// PAYEE ADDRESS DETAILS
$pdf->Cell(150, 20, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'BILL FROM:', 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(70, 6, 'BRITT INTERNATIONAL APARTMENTS
Sea View
Dar es Salaam, Dar es Salaam
Tanzania
abc@efg.com', 0, 'L');

// LINE BREAK
$pdf->SetLineWidth(0.4);
$pdf->SetDrawColor(208, 208, 208);
$pdf->Line(10, 75, 200, 75);

// PAYERS ADDRESS DETAILS
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

// INVOICE SUMMARY
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
$pdf->Cell(30, 8, 'AMOUNT DUE:', 1, 0, 'L', $fill = true);
$pdf->Cell(30, 8, '4,106,400.00', 1, 0, 'R', $fill = true);

// ITEMS HEADERS
$pdf->SetY(125);
$pdf->SetX(10);
$pdf->SetFillColor(208, 208, 208);
$pdf->Cell(38, 8, 'Item', 1, 0, 'L', true);
$pdf->Cell(38, 8, 'Description', 1, 0, 'L', true);
$pdf->Cell(38, 8, 'Quantity', 1, 0, 'R', true);
$pdf->Cell(38, 8, 'Unit Cost', 1, 0, 'C', true);
$pdf->Cell(38, 8, 'Line Total', 1, 0, 'C', true);

// ITEMS DETAILS AND PRICES
$pdf->SetY(133);
$pdf->SetX(10);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(38, 8, '101 Studio', 0, 0, 'L');
$pdf->Cell(38, 8, '12 Months Rent for Studio Apartment', 0, 0, 'L');
$pdf->Cell(38, 8, '12', 0, 0, 'R');
$pdf->Cell(38, 8, '200,000.00', 0, 0, 'C');
$pdf->Cell(38, 8, '2,400,000.00', 0, 0, 'R');
$pdf->SetY(137);
$pdf->SetX(10);
$pdf->Cell(38, 8, '* Gym', 0, 0, 'L');
$pdf->Cell(38, 8, '12 Months Gym', 0, 0, 'L');
$pdf->Cell(38, 8, '12', 0, 0, 'R');
$pdf->Cell(38, 8, '20,000.00', 0, 0, 'C');
$pdf->Cell(38, 8, '240,000.00', 0, 0, 'R');
$pdf->SetY(141);
$pdf->SetX(10);
$pdf->Cell(38, 8, '* WiFi Internet', 0, 0, 'L');
$pdf->Cell(38, 8, '12 Months WiFi', 0, 0, 'L');
$pdf->Cell(38, 8, '12', 0, 0, 'R');
$pdf->Cell(38, 8, '50,000.00', 0, 0, 'C');
$pdf->Cell(38, 8, '600,000.00', 0, 0, 'R');
$pdf->SetY(145);
$pdf->SetX(10);
$pdf->Cell(38, 8, '* Pool', 0, 0, 'L');
$pdf->Cell(38, 8, '12 Months Pool', 0, 0, 'L');
$pdf->Cell(38, 8, '12', 0, 0, 'R');
$pdf->Cell(38, 8, '20,000.00', 0, 0, 'C');
$pdf->Cell(38, 8, '240,000.00', 0, 0, 'R');

$pdf->SetLineWidth(0.4);
$pdf->SetDrawColor(208, 208, 208);
$pdf->Line(10, 152, 200, 152);

// SUB TOTAL, TAX AND TOAL SECTION
$pdf->SetY(155);
$pdf->SetX(-70);
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(40, 6, 'SUBTOTAL:
TAX(18%):', 0, 'L');

$pdf->SetY(155);
$pdf->SetX(-50);
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(40, 6, '3,480,000.00
629,000.00', 0, 'R');

$pdf->SetY(168);
$pdf->SetX(-70);
$pdf->SetFillColor(208, 208, 208);
$pdf->Cell(30, 8, 'TOTAL:', 1, 0, 'L', $fill = true);
$pdf->Cell(30, 8, '4,106,400.00', 1, 0, 'R', $fill = true);

// FOOTER LINE BREAK
$pdf->SetLineWidth(0.4);
$pdf->SetDrawColor(208, 208, 208);
$pdf->Line(10, 250, 200, 250);

$pdf->SetY(252);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(150, 6, 'Items marked with (*) are optional amenities
BANK DETAILS: 
Account Name: BRITT INTERNATIONAL APARTMENTS | Account Number: 025664152100 | Bank Name: BRITT INTERNATIONAL BANK PLC | Swift Code: BRTQWED
', 0, 'L');

$pdf->Output();
