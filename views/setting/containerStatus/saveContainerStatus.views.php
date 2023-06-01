<?php
require_once "models/setting/containerStatus.class.php";
if(isset($_GET['id'])){
    // Je vérifie si il y'a Un ID (donnée existe), je modifie dans la base avec les données envoyés
    $statusUpdate = new containerStatus();
    if($statusUpdate -> updateContainerStatus($_GET['id'], $_POST['title'], $_POST['observation'])){
       header('Location: index.php?q=setting&categ=containerStatus&sub=all');
    } else { echo "Echec de mise à jour."; }
}else{
    // J'enregistre les données titre et observation envoyée en post
    if(isset($_POST['title'])){
        $status = new containerStatus();
        $status -> setContainerStatusTitle($_POST['title']);
        $status -> setContainerStatusObservation($_POST['observation']);
        if($status->saveContainerStatus()){
            $status ->setContainerStatusByTitle($_POST['title']);
            header('Location: index.php?q=setting&categ=containerStatus&sub=views&id='. $status->getContainerStatusId());
        } else{
            echo "echec enregistrement...";
        }
    }
}

?>