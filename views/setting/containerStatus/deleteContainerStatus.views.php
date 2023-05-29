<h1>Rapport de suppression : statut</h1>
<?php
include_once 'models/setting/containerStatus.class.php';
$status = new containerStatus();
$status -> setContainerStatusById($_GET['id']);
if($status -> deleteContainerStatus()){
    header('Location: index.php?q=setting&categ=containerStatus&sub=all');
} else{
    echo "le Status que vous voulez supprimer est encours d'utilisation par : ";
    $number = $status -> ContainerStatusUsedNumber();
    foreach($number as $value){
        echo $value;
    }
    echo "enregistrement(s). <br>Veuieller évaluer ces derniers avant de supprimer.";
}
?>