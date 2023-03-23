<?php 
require 'excel/Classes/PHPExcel.php';

$fila=2;

$objphpExcel = new PHPExcel();

$objphpExcel->getProperties()->setCreator("Pribor")->setDescription("Reporte de clientes");
$objphpExcel->setActiveSheetIndex(0);
$objphpExcel->getActiveSheet()->setTitle("clientes");

$objphpExcel->getActiveSheet()->setCellValue('A1','ID');
$objphpExcel->getActiveSheet()->setCellValue('B1','ID');
$objphpExcel->getActiveSheet()->setCellValue('C1','ID');
$objphpExcel->getActiveSheet()->setCellValue('D1','ID');

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Productos.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');

$objWriter = new PHPExcel_Writer_Excel2007($objphpExcel);
$objWriter->save('php://output');

?>