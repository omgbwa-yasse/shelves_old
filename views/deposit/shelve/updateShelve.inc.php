<h1>Modifier un épis</h1>
<?php
require_once 'models/deposit/shelve.class.php';
$shelve = new shelve();
$shelve -> setShelveById($_GET['id']);
?>
<form action="index.php?q=deposit&categ=shelve&sub=save&id=<?= $shelve->getShelveId();?>" method="POST">
<table class="table-input">
<tr>
      <td><label for="titre">Référence  </label>
      <td><input type="text" id="titre" name="reference" value="<?= $shelve->getShelveReference();?>" required>
</tr>
<tr>
    <td><label for="ear">Epis  </label>
    <td><input type="text" id="ear" name="ear" value="<?= $shelve->getShelveEar();?>" required>
</tr>
<tr>
    <td><label for="colonne"> Travée  </label>
    <td><input type="text" id="colonne" name="colonne" value="<?= $shelve->getShelveColonne();?>" required>
</tr>
<tr>
    <td><label for="tablette">Tablette (cm) </label>
    <td><input type="text" id="tablette" name="table" value="<?= $shelve->getShelveTable()*100;?>" required>
</tr>
<tr>
    <td><label for="observation" > Observation  </label>
    <td><textarea id="observation" name="observation" rows="4" cols="50"><?= $shelve->getShelveObservation() ;?></textarea>
</tr> 
<tr>
   <td> <label for="observation" > Observation  </label>
   <td> <select name="room_id">
        <?php 
          require_once 'models/deposit/roomManager.class.php';
          require_once 'models/deposit/room.class.php';
          $rooms = new roomManager();  
          foreach($rooms ->allRoom() as $id){
                $room = new room();
                $room->setRoomById($id['id']);
                echo "<option value=\"". $room->getRoomId()."\"";
                
                if($room->getRoomId() == $shelve ->getShelveRoomId()){ echo "selected";} 
                
                  echo ">". $room->getRoomReference() ." - ". $room ->getRoomTitle()."</option>";
            }
          ?>
    </select>
</tr>
</table>
<input type="submit" value="Sauvegarder la modification"> <input type="reset" value="Annuler">  
</form>


