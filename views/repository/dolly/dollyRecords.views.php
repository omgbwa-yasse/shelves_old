<?php
require_once 'models/dolly/dollyRecordManager.class.php';
require_once 'models/repository/records.class.php';
require_once 'views/repository/records/display.inc.php';

echo "<ul id=\"navigationOption\">";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=exportRecords&id=". $_GET['id']."\">". "Exporter" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=printRecords&id=". $_GET['id']."\">". "Imprimer" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=deleteRecords&id=". $_GET['id']."\">". "Supprimer" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=updateClasse&id=". $_GET['id']."\">". "Changer de classe" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=updateOrganization&id=". $_GET['id']."\">". "Changer le Detenteur"."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=updateContainer&id=". $_GET['id']."\">". "Changer de boite" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=updateStatus&id=". $_GET['id']."\">". "Changer de statut" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=updateSupport&id=". $_GET['id']."\">". "Changer de support" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=updateParentRecord&id=". $_GET['id']."\">". "Changer de Dossier parent" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=updateObservation&id=". $_GET['id']."\">". "Changer de Description" ."</a> ";
echo "<li>
    <a href=\"index.php/q=repository&categ=dolly&sub=updateDates&id=". $_GET['id']."\">". "Changer de dates-extrêmes" ."</a> ";
echo "</ul>";

$dolly = new dollyRecordManager();
$records = $dolly -> getAllRecordsByDolly($_GET['id']);
if(isset($records)){
    foreach($records as $id){
        $record = new records();
        $record -> setRecordId($id['id_records']);
        $record -> getRecordById();
        displayRecordLight($record);
    }
} else{
    echo 'aucun document est associé à ce chariot ...';
}

?>