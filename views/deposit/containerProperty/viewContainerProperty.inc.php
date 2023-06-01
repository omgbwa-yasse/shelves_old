<?php
require_once 'models/deposit/room.class.php';
require_once 'models/deposit/shelve.class.php';

$room = new room();
$room -> setRoomById($_GET['id']);
?>
<h1>Affichage : <?= $room->getRoomTitle()?></h1>
<table class="table-view">
   <tr>
      <th>n°</th>
      <th>Référence</th>
      <th>Nom de la salle</th>
      <th>Description </th>
   </tr>
   <tr>
      <?php
         echo " <td>" . $room->getRoomId();
         echo " <td>" . $room->getRoomReference();
         echo " <td>" . $room->getRoomTitle();
         echo " <td>" . $room->getRoomObservation();
      ?>
   </tr>
</table>
<br>
<div class="nav-botton">
   <div><a href="index.php?q=deposit&categ=room&sub=delete&id=<?= $room->getRoomId()?>">Supprimer</a></div>  
   <div><a href="index.php?q=deposit&categ=room&sub=update&id=<?= $room->getRoomId()?>">Modifier</a></div>  
   <div><a href="index.php?q=deposit&categ=room&sub=all">Toutes les salles</a></div>
</div>
<br><br>
<h2>Liste des épis de la salle</h2>
<ol>
<?php
   $shelvesId = $room ->RoomShelvesId($room->getRoomId());
   foreach($shelvesId as $Id){
      $shelve = new shelve();
      $shelve ->setShelveById($Id);
      echo "<li> <a href=\"index.php?q=deposit&categ=shelve&sub=view&id=". $shelve->getShelveId() ."\"> Epis n°". $shelve ->getShelveReference();
      echo " surface de stockage : ". $shelve ->getShelveEar()* $shelve ->getShelveColonne() * $shelve ->getShelveTable() ." ml";
      echo "</a></li>";
   }
?>
</ol>