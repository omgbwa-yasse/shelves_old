<?php
include_once 'models/repository/records.class.php';
include_once 'models/repository/recordsManager.class.php';

echo "Début de la function ...";

$allrecords = new recordsManager();
$idrecords = $allrecords -> getAllrecordsId();

echo "<br/>début du foreach ....";
foreach($idrecords as $Idrecord){
    echo $Idrecord['id_records'];
    $record = new records ;
    $record -> setIdRecord($Idrecord['id_records']);
    $record -> getRecordById();
    echo "<br/> titre :";
    echo $record-> getRecordTitle(); 
    echo "<br/> classe :";
    $record -> getRecordClasseCodeTitle();
    echo "<br/> boite :";
    $record -> getRecordContainerTitle();
    echo "<br/> date debut :";
    $record -> getRecordDateStart();
    echo "<br/> date de fin :";
    $record -> getRecordDateEnd();
    echo "<br/> Parent :";
    $record -> getRecordLinkId();
    echo "<br/> observation :";
    $record -> getRecordObservation();
    echo "<br/>";"<br/>";"<br/>";

}
?>


