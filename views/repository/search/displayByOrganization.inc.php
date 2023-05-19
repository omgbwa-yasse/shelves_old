
<?php
require_once 'models/repository/records.class.php';
require_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/records/display.inc.php';

$listRecords = new recordsManager();
$listRecords -> setOrganizationId($_GET['id']);
$listRecords -> setOrganizationById();
echo "<h1>Liste des enregistre du :". $listRecords -> getOrganizationTitle() . "</h1>";


$listId = $listRecords -> getAllRecordsByOrganizationId();

foreach($listId as $id_record){
    $record = new record();
    $record -> setRecordId($id_record['id']);
    $record -> getRecordById();
    displayRecordLight($record);
}
?>