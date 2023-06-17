<?php
require_once "models/repository/recordsManager.class.php";
require_once "models/deposit/containerManager.class.php";
require_once "models/repository/record.class.php";
require_once "models/deposit/container.class.php";
if(isset($_POST['record_id']) && isset($_POST['container_id'])){
    $record = new record();
    $record -> setRecordId($_POST['record_id']);
    $record -> getRecordById();
    echo $record->getRecordTitle();
    $container = new container;
    $container ->setContainerById($_POST['container_id']);
    echo $container->getContainerId();
    $record->insertInContainer($record->getRecordId(), $container->getContainerId());
}else{
    header('Location :index.php?q=repository&categ=recordInContainer&sub=link');
}
?>