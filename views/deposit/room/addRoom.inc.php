<?php
require_once 'models/deposit/room.class.php';
?>
<h1>Ajouter une  nouvelle</h1>
<form action="index.php?q=deposit&categ=room&sub=save" method="POST">
<table> 
  <tr>
    <td><label for="titre">Référence de la salle :</label>
    <td><input type="text" id="titre" name="reference" required>
  </tr>
  <tr>
    <td><label for="titre">Nom de la salle :</label>
    <td><input type="text" id="titre" name="title" required>
  </tr>
  <tr>
    <td><label for="observation" >Description de la salle :</label>
    <td><textarea id="observation" name="observation" rows="4" cols="50"></textarea>
  </tr>
  <tr>
    <td><input type="submit" value="Sauvegarder">
    <td><input type="reset" value="Annuler">
  </tr>
</table> 
</form>