<?php
require_once 'models/tools/commuicability/comrule.class.php';
$comrule = new comrule();
$comrule ->setcomrulebyid($_GET['id']);


    echo '<h1>Vous avez supprimer cette regle  avec success :</h1>';
    echo "<table border='0'>";
    echo "<tr>";
    echo "<td><b>  TIME  :</b>". $comrule ->getcomrule_time();
    echo "<tr>";
    echo "<td><b> TITRE  :</b>".$comrule ->getcomrule_title();
    echo "<tr>";
    echo "<td><b> Reference  :</b>".$comrule ->getcomrule_ref();
    echo "<tr>";
    echo "<td><b> Classificatin associer(id) :</b>".$comrule ->getcomrule_class_id();
    echo "<tr>";
    echo "</table>";
    $comrule  ->delcomrule($comrule->getcomrule_id());


echo "<hr/>";



?>
<a href="index.php?q=tools&categ=communicability&sub=allrule"> <- toute les regle de Communicabilité</a>