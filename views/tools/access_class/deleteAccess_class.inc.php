<?php
require_once 'models/tools/access_class/access_class.class.php';
$Accessclass = new AccessClasse();

$Accessclass ->setAccessClasseById($_GET['id']);

    var_dump($Accessclass->getAccessClasseCode());
    echo '<h1>Vous avez supprimer cette classe d\'access  avec success :</h1>';
    echo "<table border='0'>";
    echo "<td>CODE :".$Accessclass->getAccessClasseCode();
    echo "<td>Description".$Accessclass->getAccessClasseDescription();
    echo "<td>Id de classification".$Accessclass->getClassificationId();
  
    echo "</table>";
    // $Accessclass  ->delAccessClasse($_GET['id']);


echo "<hr/>";



?>
<a href="index.php?q=tools&categ=communicability&sub=allrule"> <- toute les regle de Communicabilité</a>