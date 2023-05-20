<?php
require_once "models/repository/record.class.php";
require_once "models/repository/recordsManager.class.php";
require_once 'views/repository/records/display.inc.php';
require_once 'models/tools/classification/classe.class.php';

// Display title
$classeSearch = new activityClasse();
$classeSearch ->setClasseId($_POST['classification_id']);
$classeSearch ->setClasseById();
$id = $classeSearch->getClasseId();
echo "<h1>Liste des documents de la la classse :". $classeSearch->getClasseCode()." - " .$classeSearch->getClasseTitle()."</h1>";


// Search Records
$AllRecord = new recordsManager();
$recordsId = $AllRecord -> getAllrecordsIdByClasseId($id);
foreach($recordsId as $recordId){
    $record = new record();
    $record -> setRecordId($recordId['id']);
    $record -> getRecordById();
    displayRecordLight($record); 
    }

?>