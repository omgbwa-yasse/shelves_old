<?php
require_once "models/setting/recordSupport.class.php";
if(isset($_GET['id'])){
    // Je vérifie si il y'a Un ID (donnée existe), je modifie dans la base avec les données envoyés
    $supportUpdate = new RecordSupport();
    if($supportUpdate -> updateRecordSupport($_GET['id'], $_POST['title'],$_POST['observation'])){
        header('Location: index.php?q=setting&categ=recordStatus&sub=all');
    }
}else{
    // J'enregistre les données titre et observation envoyée en post
    if(isset($_POST['title'])){
        $support = new recordSupport();
        $support -> setRecordSupportTitle($_POST['title']);
        $support -> setRecordSupportObservation($_POST['observation']);
        if($support->saveRecordSupport()){
            $support ->setRecordSupportByTitle($_POST['title']);
            header('Location: index.php?q=setting&categ=recordSupport&sub=views&id='. $support->getRecordSupportId());
        } else{
            echo "echec enregistrement...";
        }
    }
}

?>