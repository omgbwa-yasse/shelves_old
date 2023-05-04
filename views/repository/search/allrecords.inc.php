<?php
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/records.class.php';
include_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/records/display.inc.php';


$allrecords = new recordsManager();
$idrecords = $allrecords -> getAllrecordsId();

foreach($idrecords as $Idrecord){
    $record = new records ;
    $record -> setRecordId($Idrecord['id_records']);
    $record -> getRecordById();
    
    displayRecord($record);
    
}
?>



