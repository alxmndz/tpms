<?php
use setasign\Fpdi\Fpdi;
// or for usage with TCPDF:
// use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function
require_once('vendor/autoload.php');

// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile("ppp.pdf");
// import page 1
$tplId = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplId, 10, 10, 200);

$pdf->setFont("helvetica");
$pdf->setXY(10, 50);
$pdf->Cell(100,	 5, $_GET['name'], 0, 0, "C");

$pdf->setXY(10, 70);
$pdf->Cell(100,	 5, $_GET['age'], 0, 0, "C");

$pdf->Output();            