<?php 
require 'Excel/Classes/PHPExcel.php';

header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=Proveedor.xls');


$excel = new PHPExcel(); //INSTANCIA DE LA LIBRERIA EXCEL
$excel->getProperties()->setCreator('Yorman')->setLastModifiedBy('Yorman')->setTitle('Reporte');

$excel->setActiveSheetIndex(0); //ACTIVAR LA PAGINA EN EL INDICE (0)

$pagina = $excel->getActiveSheet(); //PAGINA QUE ESTA ACTUALMENTE ACTIVA

$pagina->setTitle('Proveedores activos'); //NOMBRE DE LA PAGINA ACTIVA

$pagina->setCellValue('A1','NIT ');
$pagina->setCellValue('B1','T. PERSONA ');
$pagina->setCellValue('C1','NOMBRE');
$pagina->setCellValue('D1','DIRECCION');
$pagina->setCellValue('E1','TELEFONO ');
$pagina->setCellValue('F1','RESPONSABLE');
$pagina->setCellValue('G1','ESTADO');


$pagina->getStyle('A1:G1')->getFont()->setBold(true); //PONER EL ENCABEZADO EN NEGRILLA
$pagina->getStyle('A1:G1')->getFont()->setSize(12); //PONER EL TAMAÑO DE FUENTE 

$cont = 2;
foreach ($proveedoresActivos as $c) {
	$pagina->setCellValue('A'.$cont,utf8_decode($c->nit));
	$pagina->setCellValue('B'.$cont,utf8_decode($c->tipopersona));
	$pagina->setCellValue('C'.$cont,utf8_decode($c->nombre));
	$pagina->setCellValue('D'.$cont,utf8_decode($c->direccion));
	$pagina->setCellValue('E'.$cont,utf8_decode($c->telefono));
	$pagina->setCellValue('F'.$cont,utf8_decode($c->responsable));
	$pagina->setCellValue('G'.$cont,utf8_decode($c->estado));
	$cont++;
}


//AJUSTAR EL TAMAÑO DE LA CELDA A LA LONGITUD DEL TEXTO
foreach (range('A','G') as  $colum) {
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