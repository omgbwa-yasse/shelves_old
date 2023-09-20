<?php
require_once "models/repository/recordsManager.class.php";
require_once "views/repository/records/display.inc.php";




$recordsManager = new RecordsManager();
if(empty($_POST['text']) && $_POST['text'] == NULL ){
    echo "Vous n'avez rien saisie !";
    $allrecords = new recordsManager();
    $idrecords = $allrecords -> getAllrecordsId();
    foreach($idrecords as $Idrecord){
        $record = new record;
        $record -> setRecordId($Idrecord['id']);
        $record -> getRecordById();
        displayRecordDefault($record);
}
}else{
    echo "Recherche simple : ".$_POST['text'];
    $list = $recordsManager->search($_POST['text']);
    foreach($list as $id){
    $record = new record();
    $record->hydrateRecordById($id);
    displayRecordDefault($record);
}
}

?>
