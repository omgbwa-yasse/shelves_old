<?php
require_once 'models/dolly/dollyRecordManager.class.php';
require_once 'models/dolly/dollyRecord.class.php';
require_once 'models/repository/record.class.php';
require_once 'views/repository/records/display.inc.php';

$dolly = new dollyRecord();
$dolly -> setDollyRecordId($_GET['id']);
$dolly -> setDollyRecordById();
echo $dolly -> getDollyRecordTitle();

echo "<table border ='0'>";
echo "<tr>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=updateClasse&id=". $_GET['id']."\">". "Changer de classe" ."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=updateOrganization&id=". $_GET['id']."\">". "Changer le Detenteur"."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=updateContainer&id=". $_GET['id']."\">". "Changer de boite" ."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=updateStatus&id=". $_GET['id']."\">". "Changer de statut" ."</a></td>
    </tr>
    <tr>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=updateSupport&id=". $_GET['id']."\">". "Changer de support" ."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=updateParentRecord&id=". $_GET['id']."\">". "Changer de Dossier parent" ."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=updateObservation&id=". $_GET['id']."\">". "Changer de Description" ."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=updateDates&id=". $_GET['id']."\">". "Changer de dates-extrêmes" ."</a></td>
    </tr>
    <tr>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=exportRecords&id=". $_GET['id']."\">". "Exporter" ."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=printRecords&id=". $_GET['id']."\">". "Imprimer" ."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=deleteRecords&id=". $_GET['id']."\">". "Supprimer" ."</a></td>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=tranfer&id=". $_GET['id']."\">". "changer de chariot" ."</a></td>
    </tr>
    </table>";

echo "<h2>Liste des documents<h2>";
echo "<a href=\"index.php?q=repository&categ=dolly&sub=addRecords&id=". $_GET['id']."\">". "Ajouter plusieurs documents" ."</a> ";

$records = new recordsManager();
if($records -> isDollyRecordEmpty($dolly -> getDollyRecordId())){
    echo "ce panier n'est pas vide...";
    $records = $records -> getRecordsByDollyId($dolly -> getDollyRecordId());
    foreach($records as $id){
        echo "les id des records" . $id['id'];
        $record = new record();
        $record -> setRecordId($id['id']);
        $record -> getRecordById();
        echo $record->getRecordId();
        echo var_dump($record);
        echo $record->getRecordTitle();
        
        //displayRecord($record);displayRecordLight($record);
    }
} else{
    echo 'aucun document est associé à ce chariot ...';
}

?>