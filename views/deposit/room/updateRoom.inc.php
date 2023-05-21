<h1>Modifier une salle</h1>
<?php
require_once 'models/deposit/room.class.php';
$room = new room();
$room -> setRoomById($_GET['id']);
?>
<form action="index.php?q=deposit&categ=room&sub=save&id=<?= $room->getRoomId();?>" method="POST">
  <div>
    <label for="titre">Référence de la salle :</label>
    <input type="text" id="titre" name="reference" value="<?= $room->getRoomReference();?>" required>
  </div>
  <div>
    <label for="titre">Nom de la salle :</label>
    <input type="text" id="titre" name="title" value="<?= $room->getRoomTitle();?>" required>
  </div>
  <div>
    <label for="observation" >Description de la salle :</label>
    <textarea id="observation" name="observation" rows="4" cols="50" value="<?= $room->getRoomObservation(); ;?>" ></textarea>
  </div>
  <div>
    <input type="submit" value="Sauvegarder la modification">
    <input type="reset" value="Annuler">
  </div>
</form>


