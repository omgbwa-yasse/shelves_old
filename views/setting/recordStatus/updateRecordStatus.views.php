<h1>Modiffier</h1>

<?php
    require_once 'models/setting/recordStatus.class.php';
    $status = new recordStatus();
    $status -> setRecordStatusById($_GET['id']);
?>
<form action="index.php?q=setting&categ=recordStatus&sub=save&id=<?= $status->getRecordStatusId() ;?>" method="POST">
  <div>
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="title" value="<?= $status->getRecordStatusTitle();?>" required>
  </div>
  <div>
    <label for="observation" >Observation :</label>
    <textarea id="observation" name="observation" rows="4" cols="50"> <?= $status->getRecordStatusObservation();?></textarea>
  </div>
  <div>
    <input type="submit" value="Sauvegarder la modification">
    <input type="reset" value="Annuler">
  </div>
</form>