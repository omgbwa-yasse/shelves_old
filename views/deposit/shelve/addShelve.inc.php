<?php
require_once 'models/deposit/shelve.class.php';
require_once 'models/deposit/roomManager.class.php';
require_once 'models/deposit/room.class.php';
?>

<h1>Nouvelle étagière</h1>
<form action="index.php?q=deposit&categ=shelve&sub=save" method="POST">
<table>
<tr>    
  <th><label for="titre"> Référence </label>
  <td><input type="text" id="titre" name="reference" required>
</tr>
<tr>
  <th><label for="face"> Face </label>
  <td> <input type="text" id="face" name="ear" required>
</tr>
<tr>
  <th><label for="travée"> Travée </label>
  <td><input type="text" id="travée" name="colonne" required>
</tr>
<tr>
  <th><label for="tablette"> Tablette (centimètre) </label>
  <td><input type="text" id="tablette" name="table" required>
</tr>
<tr>
  <th><label for="titre"> Salle </label>
  <td>
<select name="room_id">
  <?php 
  $rooms = new roomManager();  
  foreach($rooms ->allRoom() as $id){
        $room = new room();
        $room->setRoomById($id['id']);
        echo "<option value=\"". $room->getRoomId()."\">". $room->getRoomReference() ." - ". $room ->getRoomTitle()."</option>";
    }
  ?>
</select>
</tr>
<tr>
  <th><label for="observation" >Observation </label>
  <td><textarea id="observation" name="observation" rows="4" cols="50"></textarea>
</tr>
<tr>
  <td><input type="submit" value="Sauvegarder">
  <td><input type="reset" value="Annuler">
</tr>
</table>
</form>