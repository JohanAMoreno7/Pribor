<?php 
require 'Excel/Classes/PHPExcel.php';

header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=Clientes.xls');


$excel = new PHPExcel(); //INSTANCIA DE LA LIBRERIA EXCEL
$excel->getProperties()->setCreator('Yorman')->setLastModifiedBy('Yorman')->setTitle('Reporte');

$excel->setActiveSheetIndex(0); //ACTIVAR LA PAGINA EN EL INDICE (0)

$pagina = $excel->getActiveSheet(); //PAGINA QUE ESTA ACTUALMENTE ACTIVA

$pagina->setTitle('Clientes activos'); //NOMBRE DE LA PAGINA ACTIVA

$pagina->setCellValue('A1','NOMBRE ');
$pagina->setCellValue('B1','APELLIDO ');
$pagina->setCellValue('C1','TELEFONO ');
$pagina->setCellValue('D1','TIPO DOCUMENTO');
$pagina->setCellValue('E1','DOCUMENTO ');
$pagina->setCellValue('F1','ESTADO');


$pagina->getStyle('A1:F1')->getFont()->setBold(true); //PONER EL ENCABEZADO EN NEGRILLA
$pagina->getStyle('A1:F1')->getFont()->setSize(12); //PONER EL TAMAÑO DE FUENTE 

$cont = 2;
foreach ($clientes as $c) {
	$pagina->setCellValue('A'.$cont,utf8_decode($c->nombre));
	$pagina->setCellValue('B'.$cont,utf8_decode($c->apellido));
	$pagina->setCellValue('C'.$cont,utf8_decode($c->telefono));
	$pagina->setCellValue('D'.$cont,utf8_decode($c->tipoD));
	$pagina->setCellValue('E'.$cont,utf8_decode($c->documento));
	$pagina->setCellValue('F'.$cont,utf8_decode($c->estado));
	$cont++;
}


//AJUSTAR EL TAMAÑO DE LA CELDA A LA LONGITUD DEL TEXTO
foreach (range('A','F') as  $colum) {
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