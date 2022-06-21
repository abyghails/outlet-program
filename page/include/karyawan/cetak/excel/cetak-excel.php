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
$sheet->setCellValue('C2', 'ALAMAT')->getColumnDimension('C')->setAutoSize(true);
$sheet->setCellValue('D2', 'TANGGAL LAHIR')->getColumnDimension('D')->setAutoSize(true);
$sheet->setCellValue('E2', 'JABATAN')->getColumnDimension('E')->setAutoSize(true);

$i = 3;
$no = 1;
$dataKaryawan = query("SELECT * FROM karyawan");
foreach ($dataKaryawan as $data) {
	$tanggal_lahir = date("d-m-Y", strtotime($data['tgl_lahir']));

	$sheet->setCellValue('A' . $i, $no);
	$sheet->setCellValue('B' . $i, $data['nama']);
	$sheet->setCellValue('C' . $i, $data['alamat']);
	$sheet->setCellValue('D' . $i, $tanggal_lahir);
	$sheet->setCellValue('E' . $i, $data['jabatan']);
	$i++;
	$no++;
}

// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Data-Karyawan ' . date('d-m-Y H'));

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data-Karyawan.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');


$writer = new Xlsx($spreadsheet);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
