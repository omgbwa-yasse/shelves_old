<?php
require_once 'models/tools/access_class/access_class.class.php';
$Accessclass = new AccessClasse();
$AllAccessclass = $Accessclass->allAccessClasses();
?>
<h1>Classe d'acces</h1>
<table border="2" width="800px">
    <tr>
        <th>code</th>
        <th>Description</th>
        <th>Classification ID </th>
        <th colspan =3>action</th>
    </tr>
<?php
var_dump($AllAccessclass);
foreach($AllAccessclass as $Accessclass){
    echo "<tr>";
    echo "<td>".$Accessclass['access_classe_code'];
    echo "<td>".$Accessclass['access_classe_description'];
    echo "<td>".$Accessclass['classification_id'];
  
   
    echo "<td><a href=\"index.php?q=tools&categ=communicability&sub=viewsAccessclass&id=".$Accessclass['access_classe_id']."\">Afficher</a>";
    echo "<td><a href=\"index.php?q=tools&categ=communicability&sub=DeleteAccessclass&id=".$Accessclass['access_classe_id']."\">Supprimmer</a>";
    echo "<td><a href=\"index.php?q=tools&categ=communicability&sub=UpdateAccessclass&id=".$Accessclass['access_classe_id']."\">Modifier</a>";
    
    

}?>
</table>
