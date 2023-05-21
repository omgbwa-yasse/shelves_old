<?php
require_once "models/setting/recordStatus.class.php";
if(isset($_GET['id'])){
    // Je vérifie si il y'a Un ID (donnée existe), je modifie dans la base avec les données envoyés
    $statusUpdate = new recordStatus();
    if($statusUpdate -> updateRecordStatus($_GET['id'], $_POST['title'],$_POST['observation'])){
        header('Location: index.php?q=setting&categ=recordStatus&sub=all');
    }
}else{
    // J'enregistre les données titre et observation envoyée en post
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
}

?>