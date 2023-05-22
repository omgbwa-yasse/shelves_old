<?php
require_once 'models/deposit/shelve.class.php';
$shelve = new shelve();
$shelve -> setShelveById($_GET['id']);
?>
<h1>Affichage : <?= $shelve->getShelveReference()?></h1>
<?php
   echo " <br>" . $shelve->getShelveId();
   echo " <br>" . $shelve->getShelveReference();
   echo " <br>" . $shelve->getShelveEar();
   echo " <br>" . $shelve->getShelveColonne();
   echo " <br>" . $shelve->getShelveTable();
   echo " <br>" . $shelve->getShelveObservation();
?>
<br>
<a href="index.php?q=deposit&categ=shelve&sub=delete&id=<?= $shelve->getShelveId()?>">Supprimer</a>  
<a href="index.php?q=deposit&categ=shelve&sub=update&id=<?= $shelve->getShelveId()?>">Modifier</a>  
<a href="index.php?q=deposit&categ=shelve&sub=all">Toutes les salles</a>