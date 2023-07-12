<?php
require_once 'models/repository/recordsManager.class.php';
require_once 'models/repository/record.class.php';
require_once 'views/repository/records/display.inc.php';

echo "<h1>Recherche par dates extrêmes</h1>";

if(empty($_POST['date_end'])){
    $newDate = new DateTime();
     $_POST['date_end'] = $newDate->format('Y-m-d');
}

echo "Date de début : <b> ". $_POST['date_start'] ."</b> à <b> ".$_POST['date_end'] . "</b>";
if(isset($_POST['date_start']) AND isset($_POST['date_end'])){

    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $records = new recordsManager();
    $listId;
    $listId = $records-> MgGetRecordsByDates($date_start, $date_end); 
    foreach($listId as $id){
        $record = new record();
        $record->setRecordId($id['record_id']);
        $record-> getRecordById();
        displayRecordDefault($record);
    } 
} else{
    echo "Date incorrecte ...";
}?>