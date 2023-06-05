<h1>Modifier une salle</h1>
<?php
require_once 'models/deposit/containerProperty.class.php';
$containerProperty = new containerProperty();
$containerProperty -> setContainerPropertyById($_GET['id']);
?>
<form action="index.php?q=deposit&categ=containerProperty&sub=save&id=<?= $containerProperty->getContainerPropertyId();?>" method="POST">
  <div>
    <label for="titre">Référence de la salle :</label>
    <input type="text" id="titre" name="reference" value="<?= $containerProperty->getContainerPropertyReference();?>" required>
  </div>
  <div>
    <label for="titre">Nom de la salle :</label>
    <input type="text" id="titre" name="title" value="<?= $containerProperty->getContainerPropertyTitle();?>" required>
  </div>
  <div>
    <label for="observation" >Description de la salle :</label>
    <textarea id="observation" name="observation" rows="4" cols="50"><?= $containerProperty->getContainerPropertyObservation() ;?></textarea>
  </div>
  <div>
    <input type="submit" value="Sauvegarder la modification">
    <input type="reset" value="Annuler">
  </div>
</form>


