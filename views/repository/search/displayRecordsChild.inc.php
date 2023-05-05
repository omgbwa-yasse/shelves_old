<?php
require_once "models/repository/keywordsManager.class.php";
require_once "models/repository/keyword.class.php";
require_once "views/repository/records/display.inc.php";
echo "Liste des sous élements de :";
echo "<div style=\"margin-bottom:30px;\">";
$parent = new records();
$parent -> setRecordId($_GET['id']);
$parent -> getRecordById();
echo "<h1 class=\"subRecords title\">  ". $parent->controlNui() ." | ".$parent->getRecordTitle();
echo "</h1><a href=\"index.php?q=repository&categ=search&sub=display&id=".$parent->getRecordId()."\">Voir la fiche descriptive</a></div>";


$listId = new recordsManager();
$listId = $listId -> getAllSubRecordsIdById($_GET['id']);
foreach($listId as $id){
    $record = new records();
    $record -> setRecordId($id['id']);
    $record -> getRecordById();
    displayRecord($record);
}


?>