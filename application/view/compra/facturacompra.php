<?php 
require 'plantilla.php';

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',13);

$pdf->SetY(3);
$pdf->SetX(87);
$pdf->Cell(40,6,'MASCOTAS APOLO',0,2,'C',0);
$pdf->SetX(87);
$pdf->SetFont('Arial','',9);
$pdf->Cell(40,6,'TELEFONO: 4419353',0,1,'C',0);
$pdf->SetX(87);
$pdf->SetFont('Arial','',9);
$pdf->Cell(40,6,'CR 85 A 79 146',0,1,'C',0);
$pdf->SetX(-60);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(40,6,utf8_decode('Compra N°:'),0,0,'C',0);
$pdf->SetX(-40);
$pdf->SetFont('Arial','',11);
foreach ($proveedor as $v) {
	$pdf->Cell(40,6,utf8_decode($v->idcompra),0,0,'C',0);
}
$pdf->Ln(15);

$pdf->SetX(2);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(40,6,'Proveedor:',0,0,'C',false);
$pdf->SetFont('Arial','',11);
foreach ($proveedor as $c) {
	$pdf->Cell(55,6,$c->nombre,0,0,'L',0);
}
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,6,'Nit:',0,0,'L',false);
$pdf->SetFont('Arial','',11);
foreach ($nit as $v) {
	$pdf->Cell(40,6,$v->nit,0,1,'L',0);
}
$pdf->SetX(2);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(40,6,'Usuario:    ',0,0,'C',0);
$pdf->SetFont('Arial','',11);
foreach ($comprador as $v) {
$pdf->Cell(55,6,$v->comprador,0,0,'L',0);
}
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,6,'Fecha: ',0,0,'L',0);
$pdf->SetFont('Arial','',11);
foreach ($fecha as $v) {
	$pdf->Cell(40,6,$v->fecha,0,1,'L',0);
}

$pdf->Ln();

$pdf->SetFont('Arial','B',11);
// $pdf->SetFillColor();
$pdf->Cell(60,6,'PRODUCTO',0,0,'C',1);
$pdf->Cell(40,6,'CANTIDAD',0,0,'C',1);
$pdf->Cell(40,6,'PRECIO',0,0,'C',1);
$pdf->Cell(50,6,'SUBTOTAL',0,1,'C',1);

$pdf->SetFont('Arial','',11);

$cont = 0;
foreach ($productos as $v) {
	$pdf->Cell(60,6,$v->nombre,0,0,'C',0);
	$pdf->Cell(40,6,$v->cantidadlote,0,0,'C',0);
	$pdf->Cell(40,6,$v->precio,0,0,'C',0);
	$pdf->Cell(50,6,$v->precio*$v->cantidadlote,0,1,'C',0);

}
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,6,'',0,0,'C',0);
$pdf->Cell(40,6,'',0,0,'C',0);
$pdf->Cell(40,6,'SUBTOTAL :',0,0,'C',0);
$pdf->SetFont('Arial','',11);
$contador = 0;
foreach ($subtotal as $v) {
$pdf->Cell(50,6,$contador+=$v->sub,0,1,'C',0);
}


$pdf->SetFont('Arial','B',11);
// $pdf->SetFillColor();
$pdf->Cell(60,6,'',0,0,'C',0);
$pdf->Cell(40,6,'',0,0,'C',0);
$pdf->Cell(40,6,'IVA :',0,0,'C',0);
$pdf->SetFont('Arial','',11);
foreach ($iva as $v) {
$pdf->Cell(50,6,$v->iva,0,1,'C',0);
}
$pdf->Cell(60,6,'',0,0,'C',0);
$pdf->Cell(40,6,'',0,0,'C',0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,6,'TOTAL :',0,0,'C',0);
$pdf->SetFont('Arial','',11);
foreach ($total as $v) {
	$pdf->Cell(50,6,$v->preciocompra,0,1,'C',0);
}



$pdf->SetFont('Arial','',10);
// foreach ($clientesActivos as $c) {
// 	$pdf->Cell(40,6,utf8_decode($c->nombre),1,0,'C');
// 	$pdf->Cell(30,6,utf8_decode($c->apellido),1,0,'C');
// 	$pdf->Cell(30,6,$c->telefono,1,0,'C');
// 	$pdf->Cell(40,6,utf8_decode($c->tipoD),1,0,'C');
// 	$pdf->Cell(30,6,$c->documento,1,0,'C');
// 	$pdf->Cell(25,6,utf8_decode($c->estado),1,1,'C');

// }

$pdf->Output();



?>