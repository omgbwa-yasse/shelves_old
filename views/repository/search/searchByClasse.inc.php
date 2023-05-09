<?php
require_once "models/repository/records.class.php";
require_once "models/repository/recordsManager.class.php";
require_once 'views/repository/records/display.inc.php';
require_once 'models/tools/classification/classe.class.php';


$classeSearch = new activityClasse();
$classeSearch ->setClasseId($_POST['classe_id']);
$classeSearch ->setClasseById();

// Afficher les ID
echo "<h1>Liste des documents de la la classse : ". $classeSearch->getClasseTitle() ."</h1>";


$AllRecord = new recordsManager();
$recordsId = $AllRecord -> getAllrecordsIdByClasseId($classeSearch->getClasseId());
    if(!empty($recordsId)){
            foreach($recordsId as $recordId){
            $record = new records();
            $record -> setRecordId($recordId['id']);
            $record -> getRecordById();
            displayRecordLight($record); }
        }else{
            echo "Aucun document associé ...";
        }

?>