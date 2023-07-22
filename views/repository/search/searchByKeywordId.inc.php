<?php

require_once 'models/repository/keywordsManager.class.php';
require_once 'models/repository/keyword.class.php';
require_once 'models/repository/record.class.php';
require_once 'views/repository/records/display.inc.php';

$Keywords = new keywordsManager();
$RecordsId = $Keywords-> recordsIdsByKeywordId($_GET['id']);
if(!empty($RecordsId)){
    foreach($RecordsId as $id){
        $record = new record ;
        $record -> setRecordId($id['record_id']);
        $record -> getRecordById();
        displayRecordLight($record);
        break;
        } 
        echo "</td></table>";

    }


?>