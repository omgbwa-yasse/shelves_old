<?php

require_once 'models/repository/keyword.class.php';
require_once 'models/repository/records.class.php';
require_once 'views/repository/records/display.inc.php';

$Keywords = new keyword();
$Keywords->setKeywordId($_GET['id']);
$allRecordsId = NULL;
$allRecordsId = $Keywords-> getAllRecordsIdByKeywordId();
echo "<hr/>";
if(!empty($allRecordsId)){
    foreach($allRecordsId as $id){
        $record = new records ;
        $record -> setRecordId($id['records_id']);
        $record -> getRecordById();
        displayRecord($record);
        break;
        } 
        echo "</td></table>";

    }


?>