<?php
require_once 'models/dolly/dollyRecord.class.php';
require_once 'models/repository/record.class.php';

$list = htmlspecialchars($_POST['listRecords']);
$list = explode("\n", $list);

echo $_GET['id'] . " chariot <br/>";

$dolly = new dollyRecord();
foreach ($list as $reference) {
    echo $reference . " NUI trouvée ";
    $record = new record();
    $record -> setRecordNui($reference);
    $record -> setRecordIdByNui();
    echo "<br/> dolly :" . $_GET['id'];
    echo "<br/> Id record :" . $record -> getRecordNui() . " et ". $record -> getRecordId() ;
    echo "<br/> Vérification ...";
    if($dolly ->verificationDollyUseRecord($record->getRecordId(), $_GET['id'])){
        echo "Ok";
    }else{
        echo "ko";
    };
    
    
    
    
    
    if($dolly -> linkDollyRecordToRecord( $record->getRecordId(), $_GET['id']))
    {
        echo "Enregistré..." ; 
    }else{
        echo "Erreur d'enregistrement ...";
    }  
}

?>
