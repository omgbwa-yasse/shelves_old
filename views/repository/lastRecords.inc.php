<?php 
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/records.class.php';
include_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/display.inc.php';
?>
<h2>Pour plus de résultat 
    <b>
        <a href ="../shelves/index.php?q=repository&categ=search&sub=allrecords">Tous les enregistrements</a>
    </b>
</h2>
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