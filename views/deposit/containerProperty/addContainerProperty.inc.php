<?php
require_once 'models/deposit/containerProperty.class.php';
?>
<h1>Ajouter un nouveau format</h1>
<form action="index.php?q=deposit&categ=containerProperty&sub=save" method="POST">
<table class="table-input"> 
  <tr>
    <td><label for="title">Titre </label>
    <td><input type="text" id="title" name="title" required>
  </tr>
  
  <tr>
    <td><label for="width">Longueur (en cm) </label>
    <td><input type="text" id="width" name="width" required>
  </tr>

  <tr>
    <td><label for="lengh">Largeur (en cm) </label>
    <td><input type="text" id="lengh" name="lengh" required>
  </tr>

  <tr>
    <td><label for="thinkness">Epaisseur (en cm)</label>
    <td><input type="text" id="thinkness" name="thinkness" required>
  </tr>
</table>
  <input type="submit" value="Sauvegarder">
  <input type="reset" value="Annuler">
</form>