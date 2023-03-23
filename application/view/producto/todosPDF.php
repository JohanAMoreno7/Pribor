<?php 

require 'plantilla.php';

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetX(2);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(47,6,'PRODUCTO',1,0,'C',1);
$pdf->Cell(15,6,'MARCA',1,0,'C',1);
$pdf->Cell(29,6,'PRESENTACION',1,0,'C',1);
$pdf->Cell(22,6,'CATEGORIA',1,0,'C',1);
$pdf->Cell(15,6,'MEDIDA',1,0,'C',1);
$pdf->Cell(18,6,'U.MEDIDA',1,0,'C',1);
$pdf->Cell(15,6,'ESPECIE',1,0,'C',1);
$pdf->Cell(14,6,'STOCK',1,0,'C',1);
$pdf->Cell(15,6,'PRECIO',1,0,'C',1);
$pdf->Cell(15,6,'ESTADO',1,1,'C',1);


$pdf->SetX(2);
$pdf->SetFont('Arial','',8);
foreach ($productoss as $c) {
	$pdf->Cell(47,6,$c->nombre,1,0,'',0);
	$pdf->Cell(15,6,$c->nombreMarca,1,0,'C',0);
	$pdf->Cell(29,6,$c->nombrePresentacion,1,0,'C',0);
	$pdf->Cell(22,6,$c->nombreCategoria,1,0,'C',0);
	$pdf->Cell(15,6,$c->medida,1,0,'C',0);
	$pdf->Cell(18,6,$c->nombreUmedida,1,0,'C',0);
	$pdf->Cell(15,6,$c->especie,1,0,'C',0);
	$pdf->Cell(14,6,$c->stock,1,0,'C',0);
	$pdf->Cell(15,6,$c->precio,1,0,'C',0);
	$pdf->Cell(15,6,$c->estado,1,1,'C',0);
	$pdf->SetX(2);
}

$pdf->Output();



?>