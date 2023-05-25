<?php
require_once 'models/deposit/shelve.class.php';
$shelve = new shelve();
$shelve -> setShelveById($_GET['id']);
?>
<h1>Affichage : <?= $shelve->getShelveReference()?></h1>
<table border="2" width="800px">
   <th>Id </th>
   <th>Reférence </th>
   <th>Epis </th>
   <th>Travée </th>
   <th>Tablette </th>
   <th>Observation</th>
<?php
   echo "<tr><td>" . $shelve->getShelveId();
   echo "<td>" . $shelve->getShelveReference();
   echo "<td>" . $shelve->getShelveEar();
   echo "<td>" . $shelve->getShelveColonne();
   echo "<td>" . $shelve->getShelveTable();
   echo "<td>" . $shelve->getShelveObservation();
   echo "</tr>";
?>
</table>
<br>
<a href="index.php?q=deposit&categ=shelve&sub=delete&id=<?= $shelve->getShelveId()?>">Supprimer</a>  
<a href="index.php?q=deposit&categ=shelve&sub=update&id=<?= $shelve->getShelveId()?>">Modifier</a>  
<a href="index.php?q=deposit&categ=shelve&sub=all">Toutes les étagières</a>