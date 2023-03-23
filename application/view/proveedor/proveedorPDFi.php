<?php 

require 'plantilla.php';

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(20,6,'NIT',1,0,'C',1);
$pdf->Cell(25,6,'T. PERSONA',1,0,'C',1);
$pdf->Cell(30,6,'NOMBRE',1,0,'C',1);
$pdf->Cell(40,6,'DIRECCION',1,0,'C',1);
$pdf->Cell(26,6,'TELEFONO',1,0,'C',1);
$pdf->Cell(30,6,'RESPONSABLE',1,0,'C',1);
$pdf->Cell(20,6,'ESTADO',1,1,'C',1);


$pdf->SetFont('Arial','',10);
foreach ($proveedoresInactivos as $c) {
	$pdf->Cell(20,6,$c->nit,1,0,'C');
	$pdf->Cell(25,6,utf8_decode($c->tipopersona),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($c->nombre),1,0,'C');
	$pdf->Cell(40,6,$c->direccion,1,0,'C');
	$pdf->Cell(26,6,$c->telefono,1,0,'C');
	$pdf->Cell(30,6,utf8_decode($c->responsable),1,0,'C');
	$pdf->Cell(20,6,$c->estado,1,0,'C');
	$pdf->Cell(0,6,'',1,1,'C');
}

$pdf->Output();



?>