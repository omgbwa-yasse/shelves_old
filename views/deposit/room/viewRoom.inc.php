<?php
require_once 'models/deposit/room.class.php';
require_once 'models/deposit/shelve.class.php';

$room = new room();
$room -> setRoomById($_GET['id']);
?>
<h1>Affichage : <?= $room->getRoomTitle()?></h1>
<?php
   echo " <br>" . $room->getRoomId();
   echo " <br>" . $room->getRoomReference();
   echo " <br>" . $room->getRoomTitle();
   echo " <br>" . $room->getRoomObservation();
?>
<br>
<a href="index.php?q=deposit&categ=room&sub=delete&id=<?= $room->getRoomId()?>">Supprimer</a>  
<a href="index.php?q=deposit&categ=room&sub=update&id=<?= $room->getRoomId()?>">Modifier</a>  
<a href="index.php?q=deposit&categ=room&sub=all">Toutes les salles</a>
<br><br>
<h2>Liste des étagaires de la salle</h2>
<ol>
<?php
   $shelvesId = $room ->RoomShelvesId($room->getRoomId());
   foreach($shelvesId as $Id){
      $shelve = new shelve();
      $shelve ->setShelveById($Id);
      echo "<li><a href=\"index.php?q=deposit&categ=shelve&sub=view&id=". $shelve->getShelveId() ."\">". $shelve ->getShelveReference();
      echo " - ". $shelve ->getShelveObservation();
      echo "</a></li>";
   }
?>
</ol>