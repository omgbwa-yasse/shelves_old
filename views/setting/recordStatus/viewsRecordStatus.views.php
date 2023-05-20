<?php
    require_once "models/setting/recordStatus.class.php";
?>

<h1> Statut </h1>
<?php 
if(isset($_GET['id'])){
    $status = new RecordStatus();
    $status ->setRecordStatusById($_GET['id']);
    echo $status ->getRecordStatusTitle();
    echo "<br>";
    echo $status ->getRecordStatusObservation();

?>
<?php
echo "<a href=\"index.php?q=setting&categ=recordStatus&sub=delete&id=". $status ->getRecordStatusId() ."\">supprimer</a>";
echo " <a href=\"index.php?q=setting&categ=recordStatus&sub=udapte&id=". $status ->getRecordStatusId()."\">modifier</a>";
echo " <a href=\"index.php?q=setting&categ=recordStatus&sub=all\">Tout voir ...</a>";
}
?>