<?php
require_once 'models/deposit/containerProperty.class.php';
require_once 'models/deposit/shelve.class.php';

$containerProperty = new containerProperty();
$containerProperty -> setContainerPropertyById($_GET['id']);
?>
<h1>Affichage : <?= $containerProperty->getContainerPropertyTitle()?></h1>
<table class="table-view">
   <tr>
      <th>n°</th>
      <th>Référence</th>
      <th>Nom de la salle</th>
      <th>Description </th>
      <th>Description </th>
      <th>Description </th>
      <th>Description </th>
   </tr>
   <tr>
      <?php
         echo " <td>" . $containerProperty->getContainerPropertyId();
         echo " <td>" . $containerProperty->getContainerPropertyTitle();
         echo " <td>" . $containerProperty->getContainerPropertyLengh();
         echo " <td>" . $containerProperty->getContainerPropertyWith();
         echo " <td>" . $containerProperty->getContainerPropertyThinkness();
      ?>
   </tr>
</table>
<br>
<div class="nav-botton">
   <div><a href="index.php?q=deposit&categ=containerProperty&sub=delete&id=<?= $containerProperty->getContainerPropertyId()?>">Supprimer</a></div>  
   <div><a href="index.php?q=deposit&categ=containerProperty&sub=update&id=<?= $containerProperty->getContainerPropertyId()?>">Modifier</a></div>  
   <div><a href="index.php?q=deposit&categ=containerProperty&sub=all">Toutes les salles</a></div>
</div>
<br><br>
<p>Ce format de contenant est utilisé : <b>
<?php
   $number = $containerProperty ->containerPropertyUsedNumber();
   foreach($number as $num){
      echo $num['occurence']; 
   }
?> fois </b>
</p>