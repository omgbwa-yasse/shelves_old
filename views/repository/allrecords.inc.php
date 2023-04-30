<?php
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/records.class.php';
include_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/display.inc.php';


$allrecords = new recordsManager();
$idrecords = $allrecords -> getAllrecordsId();

foreach($idrecords as $Idrecord){
    $record = new records ;
    $record -> setRecordId($Idrecord['id_records']);
    $record -> getRecordById();
    
    displayRecord($record);

    echo "<br/><a href=\"index.php?q=repository&categ=create&sub=delete&id=". $record->getRecordId() ." \">Supprimer</a>";
    
}
    echo '<hr/>';
?>



