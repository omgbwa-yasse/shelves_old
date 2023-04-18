<?php

require_once 'models/repository/keyword.class.php';
require_once 'models/repository/records.class.php';

$Keywords = new keyword();
$Keywords->setKeywordId($_GET['id']);
$allRecordsId = NULL;
$allRecordsId = $Keywords-> getAllRecordsIdByKeywordId();
echo "<hr/>";
if(!empty($allRecordsId)){
    foreach($allRecordsId as $id){
        $record = new records();
        $record->setRecordId($id['records_id']); 
        $record->getRecordById();
        echo $record->getRecordTitle();
        echo "<br/>";
        echo $record->getRecordObservation();
        echo "<br/>";
        echo "<hr/>";

    }}


?>