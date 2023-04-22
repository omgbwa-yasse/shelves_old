<?php

require_once 'models/repository/keyword.class.php';
require_once 'models/repository/recordsManager.class.php';
require_once 'models/repository/record.class.php';
require_once 'views/repository/display.inc.php';

$records = new recordsManager();

$listRecordsId = $records-> MgGetRecordsByDates($_POST['date_start'],$_POST['date_end']);



foreach($listRecords as $id){
    $record = new records();
    $record->setRecordId($id['records_id']);
    $record-> getRecordById();
    displayRecord($record);
}
?>