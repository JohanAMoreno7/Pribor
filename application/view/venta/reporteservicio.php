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
$pdf->SetX(-65);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(40,6,utf8_decode('Venta N°:'),0,0,'C',0);
$pdf->SetX(-40);
$pdf->SetFont('Arial','',11);
foreach ($idventa as $v) {
	$pdf->Cell(40,6,utf8_decode($v->idventa),0,0,'C',0);
}
$pdf->Ln(15);

$pdf->SetX(2);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(40,6,'Cliente:     ',0,0,'C',false);
$pdf->SetFont('Arial','',11);
foreach ($cliente as $c) {
	$pdf->Cell(40,6,$c->nombre.' '.$c->apellido,0,1,'L',0);
}
$pdf->SetX(2);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(40,6,'Vendedor: ',0,0,'C',0);
$pdf->SetFont('Arial','',11);
foreach ($vendedors as $v) {
	$pdf->Cell(40,6,$v->ven,0,0,'L',0);
}
$pdf->SetFont('Arial','B',13);
$pdf->Cell(40,6,'Fecha: ',0,0,'R',0);
$pdf->SetFont('Arial','',11);
foreach ($fecha as $v) {
	$pdf->Cell(40,6,$v->fecha,0,1,'L',0);
}

$pdf->Ln();

$pdf->SetFont('Arial','B',11);
// $pdf->SetFillColor();
$pdf->Cell(100,6,'DESCRIPCION',0,0,'C',1);
$pdf->Cell(90,6,'PRECIO',0,1,'C',1);
// $pdf->Cell(50,6,'SUBTOTAL',0,1,'C',1);

$pdf->SetFont('Arial','',11);

$cont = 0;
foreach ($servicios as $v) {
	$pdf->Cell(100,6,utf8_decode($v->descripcion),0,0,'C',0);
	$pdf->Cell(90,6,$v->valor,0,1,'C',0);
	// $pdf->Cell(50,6,$v->valor,0,1,'C',0);

}
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
// $pdf->SetFillColor();
$pdf->Cell(40,6,'',0,0,'C',0);
$pdf->Cell(40,6,'',0,0,'C',0);
$pdf->Cell(40,6,'SUBTOTAL :',0,0,'C',0);
$contadorVenta = 0;
$pdf->SetFont('Arial','',11);
foreach ($subtotal as $k) {
	$contadorVenta+=$k->valor;			
}
$pdf->Cell(50,6,$contadorVenta,0,1,'C',0);



$pdf->Cell(40,6,'',0,0,'C',0);
$pdf->Cell(40,6,'',0,0,'C',0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,6,'TOTAL :',0,0,'C',0);
$pdf->SetFont('Arial','',11);
foreach ($total as $v) {
	$pdf->Cell(50,6,$v->precioventa,0,1,'C',0);
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