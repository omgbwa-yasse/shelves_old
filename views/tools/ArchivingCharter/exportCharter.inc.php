<?php
require_once 'lib/PHPExcel-1.8/Classes/PHPExcel.php';
require_once 'models/tools/archiving_Charter/AchivingCharter.class.php';

$Charter = new ArchivingCharter();
$mainClassOFCharter = $Charter->allMainClasses();
// Création d'un nouveau document Excel
$objPHPExcel = new PHPExcel();
$sheet = $objPHPExcel->getActiveSheet();

// Définition des styles pour les en-têtes de colonnes
$headerStyleArray = [
    'font' => [
        'bold' => true,
        'color' => ['rgb' => 'FFFFFF']
    ],
    'fill' => [
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => ['rgb' => '7A5A15']
    ]
];
$sheet->getStyle('A1:I1')->applyFromArray($headerStyleArray);

// Ajout des en-têtes de colonnes
$headers = ['Mission', 'Fonction', 'Activité', 'Intitulé', 'Classe d\'access', 'Communicabilité', 'Durée de conservation', 'Sort Final', 'Observation'];
$sheet->fromArray($headers, NULL, 'A1');

// Ajout des données de la table
$row = 2;
foreach ($mainClassOFCharter as $Class) {
    // Fusion des cellules pour la première colonne
    $sheet->mergeCells('A' . $row . ':I' . $row);
    // Définition du style pour les cellules fusionnées
    $sheet->getStyle('A' . $row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C9B893');
    $sheet->setCellValue('A' . $row, $Class['classification_code']);
    $row++;
    $childLv1 = $Charter->ClassesChildBycode($Class['classification_code']);
    foreach ($childLv1 as $classChildLv1) {
        // Fusion des cellules pour la deuxième colonne
        $sheet->mergeCells('B' . $row . ':I' . $row);
        // Définition du style pour les cellules fusionnées
        $sheet->getStyle('B' . $row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B8B8B8');
        $sheet->setCellValue('B' . $row, $classChildLv1['id']);
        $row++;
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
            $sheet->fromArray($data, NULL, 'A' . $row);
            $row++;
        }
    }
}

// Génération du fichier Excel
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$filename = 'charte.xlsx';
$objWriter->save($filename);
?>
<a href="charte.xlsx"><b>Cliquez ici pour telecharger le ficher (.Xlsx) </b></a>