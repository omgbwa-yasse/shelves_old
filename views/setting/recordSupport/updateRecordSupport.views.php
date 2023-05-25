<h1>Modiffier</h1>

<?php
    require_once 'models/setting/recordSupport.class.php';
    $support = new RecordSupport();
    $support -> setRecordSupportById($_GET['id']);
?>
<form action="index.php?q=setting&categ=recordSupport&sub=save&id=<?= $support->getRecordSupportId() ;?>" method="POST">
  <div>
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="title" value="<?= $support->getRecordSupportTitle();?>" required>
  </div>
  <div>
    <label for="observation" >Observation :</label>
    <textarea id="observation" name="observation" rows="4" cols="50" > <?= $support->getRecordSupportObservation();?></textarea>
  </div>
  <div>
    <input type="submit" value="Sauvegarder la modification">
    <input type="reset" value="Annuler">
  </div>
</form>