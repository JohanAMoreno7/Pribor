<?php 
require 'Excel/Classes/PHPExcel.php';

header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=Productos.xls');


$excel = new PHPExcel(); //INSTANCIA DE LA LIBRERIA EXCEL
$excel->getProperties()->setCreator('Yorman')->setLastModifiedBy('Yorman')->setTitle('Reporte');

$excel->setActiveSheetIndex(0); //ACTIVAR LA PAGINA EN EL INDICE (0)

$pagina = $excel->getActiveSheet(); //PAGINA QUE ESTA ACTUALMENTE ACTIVA

$pagina->setTitle('Clientes activos'); //NOMBRE DE LA PAGINA ACTIVA

$pagina->setCellValue('A1','PRODUCTO ');
$pagina->setCellValue('B1','MARCA ');
$pagina->setCellValue('C1','PRESENTACION ');
$pagina->setCellValue('D1','CATEGORIA ');
$pagina->setCellValue('E1','MEDIDA ');
$pagina->setCellValue('F1','U. MEDIDA ');
$pagina->setCellValue('G1','ESPECIE ');
$pagina->setCellValue('H1','STOCK ');
$pagina->setCellValue('I1','PRECIO ');
$pagina->setCellValue('J1','ESTADO ');


$pagina->getStyle('A1:J1')->getFont()->setBold(true); //PONER EL ENCABEZADO EN NEGRILLA
$pagina->getStyle('A1:J1')->getFont()->setSize(12); //PONER EL TAMAÑO DE FUENTE 

$cont = 2;
foreach ($productosInactivos as $c) {
	$pagina->setCellValue('A'.$cont,utf8_decode($c->nombre));
	$pagina->setCellValue('B'.$cont,utf8_decode($c->nombreMarca));
	$pagina->setCellValue('C'.$cont,utf8_decode($c->nombrePresentacion));
	$pagina->setCellValue('D'.$cont,utf8_decode($c->nombreCategoria));
	$pagina->setCellValue('E'.$cont,utf8_decode($c->medida));
	$pagina->setCellValue('F'.$cont,utf8_decode($c->nombreUmedida));
	$pagina->setCellValue('G'.$cont,utf8_decode($c->especie));
	$pagina->setCellValue('H'.$cont,utf8_decode($c->stock));
	$pagina->setCellValue('I'.$cont,utf8_decode($c->precio));
	$pagina->setCellValue('J'.$cont,utf8_decode($c->estado));
	$cont++;
}


//AJUSTAR EL TAMAÑO DE LA CELDA A LA LONGITUD DEL TEXTO
foreach (range('A','J') as  $colum) {
	$pagina->getColumnDimension($colum)->setAutoSize(true);
}

//GENERAR UNA PAGINA NUEVA
/*$excel->createSheet();
$excel->setActiveSheetIndex(0);
$pagina = $excel->getActiveSheet()->setTitle('Clientes inactivos');
*/

//GENERAR EL ARCHIVO EXCEL
$objwrite = PHPExcel_IOFactory::createWriter($excel,'Excel5');
$objwrite->save('php://output');

?>