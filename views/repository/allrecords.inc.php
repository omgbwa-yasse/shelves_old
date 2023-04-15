<?php
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/records.class.php';
include_once 'models/repository/recordsManager.class.php';

echo "Début de la function ...";

$allrecords = new recordsManager();
$idrecords = $allrecords -> getAllrecordsId();

echo "<br/>début du foreach ....";
foreach($idrecords as $Idrecord){
    echo $Idrecord['id_records'];
    $record = new records ;
    $record -> setRecordId($Idrecord['id_records']);
    $record -> getRecordById();
    echo "<br/> Nui :";
    echo $record-> getRecordNui(); 
    echo "<br/> titre :";
    echo $record-> getRecordTitle(); 
    echo "<br/> classe :";
    echo  $record -> getRecordClasseCodeTitle();
    echo "<br/> boite :";
    echo $record -> getRecordContainerTitle();
    echo "<br/> date debut :";
    echo $record -> getRecordDateStart();
    echo "<br/> date de fin :";
    echo $record -> getRecordDateEnd();
    echo "<br/> Parent :";
    echo $record -> getRecordLinkId();
    echo "<br/> observation :";
    echo $record -> getRecordObservation();
    echo "<br/> <br/> <hr/>";

    // Afficher les mots clés associés
    $keywords = new keywordsManager(); 
    $keywords -> setRecordId($Idrecord['id_records']);
    $allKeywords = $keywords->getAllKeywordsByRecordId();
    
    // Je parcours les mots clés 
    foreach ($allKeywords as $word) {
        if(empty($word['keyword']) == NULL){
            echo '';
        } else {
            $keyword = new keyword();
            $keyword ->setKeyword($word['keyword']);
            echo "  <b>". $keyword->getKeyword() ."</b> "; 
        }
            
} 
}
?>


