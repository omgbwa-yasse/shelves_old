<?php
    require_once "models/setting/containerStatus.class.php";
?>

<h1> Statut de contenant </h1>
<?php 
if(isset($_GET['id'])){
    $status = new ContainerStatus();
    $status ->setContainerStatusById($_GET['id']);
    echo $status ->getContainerStatusTitle();
    echo "<br>";
    echo $status ->getContainerStatusObservation();

?>
<?php
echo "<a href=\"index.php?q=setting&categ=containerStatus&sub=delete&id=". $status ->getContainerStatusId() ."\">supprimer</a>";
echo " <a href=\"index.php?q=setting&categ=containerStatus&sub=update&id=". $status ->getContainerStatusId()."\">modifier</a>";
echo " <a href=\"index.php?q=setting&categ=containerStatus&sub=all\">Tout voir ...</a>";
}
?>