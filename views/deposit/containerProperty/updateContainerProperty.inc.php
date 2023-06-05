<h1>Modifier une salle</h1>
<?php
require_once 'models/deposit/containerProperty.class.php';
$containerProperty = new containerProperty();
$containerProperty -> setContainerPropertyById($_GET['id']);
?>
<form action="index.php?q=deposit&categ=containerProperty&sub=save&id=<?= $containerProperty->getContainerPropertyId();?>" method="POST">
<table class="table-input"> 
  <tr>
    <td><label for="title">Titre </label>
    <td><input type="text" id="title" name="title" value="<?= $containerProperty->getContainerPropertyTitle()?>" required>
  </tr>
  
  <tr>
    <td><label for="width">Longueur (en cm) </label>
    <td><input type="text" id="width" name="width" value="<?= $containerProperty->getContainerPropertyLengh()?>" required>
  </tr>

  <tr>
    <td><label for="lengh">Largeur (en cm) </label>
    <td><input type="text" id="lengh" name="lengh" value="<?= $containerProperty->getContainerPropertyWidth()?>" required>
  </tr>

  <tr>
    <td><label for="thinkness">Epaisseur (en cm)</label>
    <td><input type="text" id="thinkness" name="thinkness" value="<?= $containerProperty->getContainerPropertyThinkness()?>" required>
  </tr>
</table>
<input type="submit" value="Sauvegarder">
<input type="reset" value="Annuler">
</form>


