<?php
require_once "models/repository/records.class.php";
require_once "models/repository/recordsManager.class.php";
require_once 'views/repository/display.inc.php';


// Afficher les ID

$AllRecord = new records();
$AllRecord ->setRecordClasseCodeTitle($_POST['code_title']);
$AllRecord ->getRecordClasseCodeTitle();

$AllRecord -> setRecordClasseIdByCodeTitle();
$AllRecord -> getRecordClasseId();

$recordsId = $AllRecord -> getAllrecordsIdByClasseId();
        if(!empty($recordsId)){
            foreach($recordsId as $recordId){
            $record = new records();
            $record -> setRecordId($recordId['id']);
            $record -> getRecordById();
            displayRecord($record); }
        }else{
            echo "Aucun document associé ...";
        }

?>