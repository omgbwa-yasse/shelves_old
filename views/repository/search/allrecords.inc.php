<?php
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/record.class.php';
include_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/records/display.inc.php';


$allrecords = new recordsManager();
$idrecords = $allrecords -> getAllrecordsId();

foreach($idrecords as $Idrecord){
    $record = new record;
    $record -> setRecordId($Idrecord['record_id']);
    $record -> getRecordById();
    
    displayRecord($record);
    
}
?>



