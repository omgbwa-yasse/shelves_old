<?php
require_once "models/repository/keywordsManager.class.php";
require_once "models/repository/keyword.class.php";
require_once "views/repository/records/display.inc.php";


echo "Liste des document des enregistrements";
$list = new recordsManager();
$list = $list ->recordsInContainer($_GET['id']);
foreach($list as $id){
    $record = new record();
    $record->hydrateRecordById($id['id']);
    displayRecordDefault($record );
}
?>