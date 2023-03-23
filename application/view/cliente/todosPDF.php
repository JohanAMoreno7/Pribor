<?php 

require 'pantilla.php';

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,6,'NOMBRE',1,0,'C',1);
$pdf->Cell(30,6,'APELLIDO',1,0,'C',1);
$pdf->Cell(30,6,'TELEFONO',1,0,'C',1);
$pdf->Cell(40,6,'T. DOCUMENTO',1,0,'C',1);
$pdf->Cell(30,6,'DOCUMENTO',1,0,'C',1);
$pdf->Cell(25,6,'ESTADO',1,1,'C',1);


$pdf->SetFont('Arial','',10);
foreach ($clientes as $c) {
	$pdf->Cell(40,6,utf8_decode($c->nombre),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($c->apellido),1,0,'C');
	$pdf->Cell(30,6,$c->telefono,1,0,'C');
	$pdf->Cell(40,6,utf8_decode($c->tipoD),1,0,'C');
	$pdf->Cell(30,6,$c->documento,1,0,'C');
	$pdf->Cell(25,6,utf8_decode($c->estado),1,1,'C');
	
}

$pdf->Output();



?>