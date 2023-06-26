<?php
require_once 'models/tools/commuicability/comrule.class.php';
$comrules = new comrule();
$allcomrules =$comrules->allcomrule();
?>
<h1>Regle de communicabilité</h1>
<table border="2" width="800px">
    <tr>
        <th>Time</th>
        <th>title</th>
        <th>references </th>
        <th>id de la classe associer</th>
        <th colspan =3>action</th>
    </tr>
<?php
foreach($allcomrules as $rule){
    $comrule = new comrule();
    $comrule ->setcomrulebyid($rule['communicability_id']);
    echo "<tr>";
    echo "<td>". $comrule ->getcomrule_time();
    echo "<td>".$comrule ->getcomrule_title();
    echo "<td>".$comrule ->getcomrule_ref();
    echo "<td>".$comrule ->getcomrule_class_id();
   
    echo "<td><a href=\"index.php?q=tools&categ=communicability&sub=viewrule&id=".$comrule ->getcomrule_id()."\">Afficher</a>";
    echo "<td><a href=\"index.php?q=tools&categ=communicability&sub=deleterule&id=".$comrule ->getcomrule_id()."\">Supprimmer</a>";
    echo "<td><a href=\"index.php?q=tools&categ=communicability&sub=updaterule&id=".$comrule ->getcomrule_id()."\">Modifier</a>";
    
    

}?>
</table>
