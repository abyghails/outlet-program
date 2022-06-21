<?php
session_start();
require_once '../../../../../assets/vendor/autoload.php';
require_once '../../../../../config/koneksi.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->getStyle('B')->getNumberFormat()
	->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);

$sheet->setCellValue('A2', 'NO')->getColumnDimension('A')->setAutoSize(true);
$sheet->setCellValue('B2', 'NAMA')->getColumnDimension('B')->setAutoSize(true);
$sheet->setCellValue('C2', 'USERNAME')->getColumnDimension('C')->setAutoSize(true);
$sheet->setCellValue('D2', 'ROLE')->getColumnDimension('D')->setAutoSize(true);

$i = 3;
$no = 1;
$id = $_GET['id'];
$dataKaryawan = query("SELECT * FROM users WHERE id = $id");
foreach ($dataKaryawan as $data) {

	$sheet->setCellValue('A' . $i, $no);
	$sheet->setCellValue('B' . $i, $data['nama']);
	$sheet->setCellValue('C' . $i, $data['username']);
	$sheet->setCellValue('D' . $i, $data["role"]);
	$i++;
	$no++;
}

// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Data-Users' . date('d-m-Y H'));

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data-users.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');


$writer = new Xlsx($spreadsheet);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
