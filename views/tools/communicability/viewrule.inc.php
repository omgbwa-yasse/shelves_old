
<?php
$id=$_GET['id'];
require_once 'models/tools/commuicability/comrule.class.php';
$comrule = new comrule();

$comrule ->setcomrulebyid($id);
?>

<h1><a href="index.php?q=tools&categ=communicability&sub=allrule"> <- toute les regle de Communicabilité</a></h1>

<?php

echo "<table border='0'>";
echo "<tr>";
echo "<td><b>  Duree  :</b>". $comrule ->getcomrule_time();
echo "<tr>";
echo "<td><b> TITRE  :</b>".$comrule ->getcomrule_title();
echo "<tr>";
echo "<td><b> Reference  :</b>".$comrule ->getcomrule_ref();
echo "<tr>";
echo "<td><b> Classificatin associer(id) :</b>".$comrule ->getcomrule_class_id();
echo "<tr>";
echo "<td><b> <a href=\"index.php?q=tools&categ=communicability&sub=deleterule&id=".$comrule ->getcomrule_id()."\">Supprimmer</a>";
echo "<td><b> <a href=\"index.php?q=tools&categ=communicability&sub=updaterule&id=".$comrule ->getcomrule_id()."\">Modifier</a>";

echo "</table>";
?>