<?php
require_once 'models/deposit/room.class.php';
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