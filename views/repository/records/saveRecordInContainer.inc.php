<?php
require_once "models/repository/recordsManager.class.php";
require_once "models/deposit/containerManager.class.php";
require_once "models/repository/record.class.php";
require_once "models/deposit/container.class.php";
require_once "views/repository/records/recordContainerForm.php";

if(isset($_POST['record_id']) && isset($_POST['container_id'])){
    saveRecordInContainer($_POST['container_id'],$_POST['record_id']);
}elseif(isset($_POST['recordId']) && isset($_GET['containerId'])){
    saveRecordInContainer($_GET['containerId'],$_POST['recordId']);
}elseif(isset($_GET['recordId']) && isset($_POST['containerId'])){
    saveRecordInContainer($_POST['containerId'],$_GET['recordId']);
}

function saveRecordInContainer($containerId,$recordId){
    $record = new record();
    $record -> setRecordId($recordId);
    $record -> getRecordById();
    echo $record->getRecordTitle();
    $container = new container;
    $container ->setContainerById($containerId);
    echo $container->getContainerId();
    $record->insertInContainer($record->getRecordId(), $container->getContainerId());

    echo "<br/>Ajouter des documents...";
    insertUnkownRecordInContainer($containerId);
}
?>