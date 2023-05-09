<?php
require_once 'models/repository/records.class.php';
require_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/records/display.inc.php';

echo $_POST['classe_id'];


// Afficher les ID
$AllRecord = new records();
$AllRecord -> setRecordClasseId($_POST['classe_id']);
$recordsId = $AllRecord -> getAllrecordsIdByClasseId();

// Explorer le contenu
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