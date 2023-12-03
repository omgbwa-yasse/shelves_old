<?php
require_once "models/transfer/transferManager.class.php";
require_once "models/transfer/transfer.class.php";

echo "Etat de l'enregistrement";
echo $_POST['reference']."</br>";
echo $_POST['title']."</br>";
echo $_POST['observation']."</br>";
echo $_POST['organization_id']."</br>";
echo $_POST['transfer_status_id']."</br>";

if(isset($_POST['reference']) && isset($_POST['title']) && isset($_POST['organization_id']) && isset($_POST['transfer_status_id'])){
    echo "<hr/>";
    echo $_POST['reference']."</br>";
    echo $_POST['title']."</br>";
    echo $_POST['observation']."</br>";
    echo $_POST['organization_id']."</br>";
    echo $_POST['transfer_status_id']."</br>";

    $transfer = new transfer();
    $transfer ->setTransferReference($_POST['reference']);
    $transfer ->setTransferTitle($_POST['title']);
    $transfer ->setTransferObservation($_POST['observation']);
    $transfer ->setTransferOrganizationId($_POST['organization_id']);
    $transfer ->setTransferStatusId($_POST['transfer_status_id']);
if($transfer ->createTransfer()){
    echo "Le versement a été créé avec success, vous pouvez cliquer ici pour enregistrer les documents";
}else{
    echo "Une erreur s'est produite...";
};
}
?>