<?php
require_once 'models/repository/records.class.php';
require_once 'models/repository/recordsManager.class.php';
require_once 'models/tools/classification/classe.class.php';
require_once 'views/repository/records/display.inc.php';

// Afficher les ID
$AllRecord = new recordsManager();
$recordsId = $AllRecord -> getAllrecordsIdByClasseId($_GET['id']);
$classe = new activityClasse();
$classe->setClasseId($_GET['id']);
$classe->setClasseById();
?>

<div style="border-radius:5px;margin-bottom:30px;padding:0.5em;border:solid 2px red;font-size:20px;font-weight:bold; width:900px;">
<?= $classe->getClasseCode(). " - ".$classe->getClasseTitle();  ?>
<a href ="../shelves/index.php?q=repository&categ=search&sub=allrecords"> | Voir tous les enregistrements </a></div>

<?php
// Explorer le contenu
if(!empty($recordsId)){
    foreach($recordsId as $recordId){
        $record = new record();
        $record -> setRecordId($recordId['id']);
        $record -> getRecordById();
        displayRecord($record); }
}else{
        echo "Aucun document associé ...";
}
?>