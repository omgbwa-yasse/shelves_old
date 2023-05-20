<?php
    require_once "models/setting/recordSupport.class.php";
?>

<h1> Support </h1>
<?php 
if(isset($_GET['id'])){
    $support = new RecordSupport();
    $support ->setRecordSupportById($_GET['id']);
    echo $support ->getRecordSupportTitle();
    echo "<br>";
    echo $support ->getRecordSupportObservation();
?>
<?php
echo " <a href=\"index.php?q=setting&categ=recordSupport&sub=delete&id=". $support ->getRecordSupportId() ."\">supprimer</a>";
echo " <a href=\"index.php?q=setting&categ=recordSupport&sub=update&id=". $support ->getRecordSupportId()."\">modifier</a>";
echo " <a href=\"index.php?q=setting&categ=recordSupport&sub=all\">Tout voir ...</a>";
}
?>