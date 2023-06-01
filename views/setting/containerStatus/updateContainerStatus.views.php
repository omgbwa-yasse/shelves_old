<h1>Modiffier</h1>

<?php
    require_once 'models/setting/containerStatus.class.php';
    $status = new containerStatus();
    $status -> setContainerStatusById($_GET['id']);
?>
<form action="index.php?q=setting&categ=recordStatus&sub=save&id=<?= $status->getContainerStatusId() ;?>" method="POST">
  <div>
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="title" value="<?= $status->getContainerStatusTitle();?>" required>
  </div>
  <div>
    <label for="observation" >Observation :</label>
    <textarea id="observation" name="observation" rows="4" cols="50"> <?= $status->getContainerStatusObservation();?></textarea>
  </div>
  <div>
    <input type="submit" value="Sauvegarder la modification">
    <input type="reset" value="Annuler">
  </div>
</form>