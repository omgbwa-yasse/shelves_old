<?php
require_once 'models/deposit/room.class.php';
?>
<h1>Ajouter une  nouvelle</h1>
<form action="index.php?q=deposit&categ=room&sub=save" method="POST">
  <div>
    <label for="titre">Référence de la salle :</label>
    <input type="text" id="titre" name="reference" required>
  </div>
  <div>
    <label for="titre">Nom de la salle :</label>
    <input type="text" id="titre" name="title" required>
  </div>
  <div>
    <label for="observation" >Description de la salle :</label>
    <textarea id="observation" name="observation" rows="4" cols="50"></textarea>
  </div>
  <div>
    <input type="submit" value="Sauvegarder">
    <input type="reset" value="Annuler">
  </div>
</form>