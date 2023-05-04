<?php 
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/records.class.php';
include_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/display.inc.php';
?>
<div style="border-radius:5px;margin-bottom:30px;padding:0.5em;border:solid 2px red;font-size:20px;font-weight:bold; width:900px;">
<a href ="../shelves/index.php?q=repository&categ=search&sub=allrecords">Tous les enregistrements
</a></div>

<?php
$lastRecords = new recordsManager();
$list = $lastRecords->MgGetLastRecords();
foreach($list as $id){
    $record = new records();
    $record -> setRecordId($id['id']);
    $record -> getRecordById();
    
    displayRecord($record);
}
?>