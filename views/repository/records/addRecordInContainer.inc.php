<h1>Inserer dans un contenant</h1>
<?php
echo "Selectionner le contenant et saisissez les enregistrements à inserer</br>";
require_once "views/repository/records/recordContainerForm.php";

?>

<?php
require_once 'models/repository/record.class.php';
if(isset($_GET['recordId'])){
    echo 'Veuillez choisir le contenant à inserer...';
    insertRecordInUnkownContainer($_GET['recordId']);
}else if(isset($_GET['containerId'])){
    echo 'Veuillez choisir les enregistrements à inserer...';
    insertUnkownRecordInContainer($_GET['containerId']);
}else{
    echo 'Veuillez choisir l\'enregistrement et sa boite ...';
    insertUnknownRecordInUnkownContainer();
}
?>