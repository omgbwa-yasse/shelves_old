<?php
require_once "models/repository/records.class.php";
require_once "models/repository/recordsManager.class.php";
require_once 'views/repository/display.inc.php';

echo "Afficher par ID...classe à rechercher </br>" ;
echo $_POST['code_title'];

// Afficher les ID

$AllRecord = new records();
$AllRecord -> setRecordClasseCodeTitle($_POST['code_title']);
echo "<br/> Dans l'objet : ". $AllRecord ->getRecordClasseCodeTitle();

$AllRecord -> setRecordClasseIdByCodeTitle();
echo "<br/>Dans l'ID de la classe : ". $AllRecord -> getRecordClasseId();

$recordsId = $AllRecord -> getAllrecordsIdByClasseId();
        if(!empty($recordsId)){
            foreach($recordsId as $recordId){
            $record = new records();
            $record -> setRecordId($recordId['id']);
            echo "id est : " . $recordId['id'];
            $record -> getRecordById();
            displayRecord($record);
        
        }
        }else{
            echo "Aucun document associé ...";
        }

?>