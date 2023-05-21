<h1>Rapport de suppression : support</h1>
<?php
include_once 'models/setting/recordSupport.class.php';

$support = new RecordSupport();
$support -> setRecordSupportById($_GET['id']);
if($support -> deleteRecordSupport()){
    header('Location: index.php?q=setting&categ=recordSupport&sub=all');
} else{
    echo "le support que vous voulez supprimer est encours d'utilisation par : ";
    $number = $support -> usedNumber();
    foreach($number as $value){
        echo $value;
    }
    echo "enregistrement(s). <br>Veuieller évaluer ces derniers avant de supprimer.";
}
    

?>