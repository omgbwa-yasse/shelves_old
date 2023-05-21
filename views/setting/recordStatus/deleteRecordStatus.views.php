<h1>Rapport de suppression : statut</h1>
<?php
include_once 'models/setting/recordStatus.class.php';
$status = new recordStatus();
$status -> setRecordStatusById($_GET['id']);
if($status -> deleteRecordStatus()){
    header('Location: index.php?q=setting&categ=recordStatus&sub=all');
} else{
    echo "le Status que vous voulez supprimer est encours d'utilisation par : ";
    $number = $status -> usedNumber();
    foreach($number as $value){
        echo $value;
    }
    echo "enregistrement(s). <br>Veuieller évaluer ces derniers avant de supprimer.";
}
?>