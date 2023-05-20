<?php
require_once "models/setting/recordStatus.class.php";

if(isset($_POST['title'])){
    $status = new recordStatus();
    $status -> setRecordStatusTitle($_POST['title']);
    $status -> setRecordStatusObservation($_POST['observation']);
    if($status->saveRecordStatus()){
        $status ->setRecordStatusByTitle($_POST['title']);
        header('Location: index.php?q=setting&categ=recordStatus&sub=views&id='. $status->getRecordStatusId());
    } else{
        echo "echec enregistrement...";
    }
}
?>