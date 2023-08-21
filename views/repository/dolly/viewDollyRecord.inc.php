<?php
require_once 'models/dolly/dollyRecordManager.class.php';
require_once 'models/dolly/dollyRecord.class.php';
require_once 'models/repository/record.class.php';
require_once 'views/repository/records/display.inc.php';

$dolly = new dollyRecord();
$dolly -> setDollyRecordId($_GET['id']);
$dolly -> setDollyRecordById();
echo $dolly -> getDollyRecordTitle();

echo "<a href=\"index.php?q=repository&categ=dolly&sub=addRecord&id=". $_GET['id']."\">". "Ajouter un document" ."</a> ";

echo "<ul id=\"navigationOption\">";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=exportRecords&id=". $_GET['id']."\">". "Exporter" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=printRecords&id=". $_GET['id']."\">". "Imprimer" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=deleteRecords&id=". $_GET['id']."\">". "Supprimer" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=updateClasse&id=". $_GET['id']."\">". "Changer de classe" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=updateOrganization&id=". $_GET['id']."\">". "Changer le Detenteur"."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=updateContainer&id=". $_GET['id']."\">". "Changer de boite" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=updateStatus&id=". $_GET['id']."\">". "Changer de statut" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=updateSupport&id=". $_GET['id']."\">". "Changer de support" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=updateParentRecord&id=". $_GET['id']."\">". "Changer de Dossier parent" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=updateObservation&id=". $_GET['id']."\">". "Changer de Description" ."</a> ";
echo "<li>
    <a href=\"index.php?q=repository&categ=dolly&sub=updateDates&id=". $_GET['id']."\">". "Changer de dates-extrêmes" ."</a> ";
echo "</ul>";


$records = new recordsManager();
if($records -> isDollyRecordEmpty($dolly -> getDollyRecordId())){
    $records = $records -> getRecordsByDollyId($dolly -> getDollyRecordId());
    foreach($records as $id){
        $record = new record();
        $record -> setRecordId($id['id']);
        $record -> getRecordById();
        displayRecordLight($record);
    }
} else{
    echo 'aucun document est associé à ce chariot ...';
}

?>