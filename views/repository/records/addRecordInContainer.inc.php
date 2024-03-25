<?php
require_once "models/repository/recordsManager.class.php";
require_once "models/deposit/containerManager.class.php";
require_once "models/repository/record.class.php";
require_once "models/deposit/container.class.php";
require_once "views/repository/records/recordContainerForm.php";

if(isset($_POST['nui']) && isset($_POST['container_id'])){
    $recordId = new record();
    $recordId -> setRecordNui($_POST['nui']);
    $recordId -> setRecordIdByNui();
    saveRecordInContainer($_POST['container_id'],$recordId->getRecordId());
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
    addRecordInContainer($container->getContainerId());
}
?>