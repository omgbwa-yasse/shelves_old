<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();

// Add header row to the worksheet
$worksheet->fromArray(
    [
        ['Mission', 'Fonction', 'Activité', 'Intitulé', 'Classe d\'access', 'Communicabilité', 'Durée de conservation', 'Sort Final', 'Observation'],
    ]
);

// Apply styles to the header row
$headerStyle = [
    'font' => [
        'bold' => true,
        'color' => ['argb' => 'FFFFFFFF'],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => ['argb' => 'FF7A5A15']
    ]
];
$worksheet->getStyle('A1:I1')->applyFromArray($headerStyle);

// Set column widths
$worksheet->getColumnDimension('A')->setWidth(10);
$worksheet->getColumnDimension('B')->setWidth(10);
$worksheet->getColumnDimension('C')->setWidth(10);
$worksheet->getColumnDimension('D')->setWidth(10);
$worksheet->getColumnDimension('E')->setWidth(15);
$worksheet->getColumnDimension('F')->setWidth(15);
$worksheet->getColumnDimension('G')->setWidth(20);
$worksheet->getColumnDimension('H')->setWidth(10);
$worksheet->getColumnDimension('I')->setWidth(15);

// Add data to the worksheet
$row = 2;
foreach ($mainClassOFCharter as $Class) {
    // Add classification code row
    $worksheet->setCellValue("A$row", $Class['classification_code']);
    $worksheet->mergeCells("A$row:I$row");
    $worksheet->getStyle("A$row:I$row")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFC9B893');
    $row++;

    // Add child rows
    $childLv1 = $Charter->ClassesChildBycode($Class['classification_code']);
    foreach ($childLv1 as $classChildLv1) {
        $worksheet->setCellValue("B$row", $classChildLv1['id']);
        $worksheet->mergeCells("B$row:I$row");
        $worksheet->getStyle("B$row:I$row")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFB8B8B8');
        $row++;

        // Add grandchild rows
        $childLv2 = $Charter->makeCharterChild($classChildLv1['id']);
        foreach ($childLv2 as $classChildLv2) {
            $data = [
                '',
                '',
                $classChildLv2['classification_code'],
                $classChildLv2['classification_title'],
                $classChildLv2['access_classe_code'],
                $classChildLv2['communicability_title'],
                $classChildLv2['retention_duration'],
                $classChildLv2['retention_sort'],
                $classChildLv2['classification_observation']
            ];
            $worksheet->fromArray([$data], null, "A$row");
            $row++;
        }
    }
}

// Create a new Xlsx writer and save the file
$writer = new Xlsx($spreadsheet);
$writer->save('table.xlsx');

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="table.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;

?>