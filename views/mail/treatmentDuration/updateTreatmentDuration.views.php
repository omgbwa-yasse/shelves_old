<?php
require_once 'models/mail/TreatmentDuration.class.php';
require_once 'models/mail/mailManager.class.php';

$treatmentDurationManager = new mailManager();

if (isset($_POST['treatment_duration_id']) && isset($_POST['treatment_duration_time']) && isset($_POST['treatment_duration_observation'])) { 
    echo '<h1>UPDATED';
    $treatmentDuration = new TreatmentDuration();
    $treatmentDuration -> updateTreatmentDuration($_GET['id'],$_POST['treatment_duration_id'],$_POST['treatment_duration_time'], $_POST['treatment_duration_observation']);
   
}   
    $treatmentDuration = $treatmentDurationManager ->treatmentDurationByID($_GET['id']) ;
    foreach ($treatmentDuration as $treatmentDuration) {
?>
<h1>Modifier un Treatment Duration </h1>

<form  method="POST" action="index.php?q=mail&categ=treatmentDuration&sub=updateTreatmentDuration&id=<?=$_GET['id']?>">
<table>
   <tr>
    <td><label for="treatment_duration_id">ID :</label></td>
    <td><input type="text" id="treatment_duration_id" name="treatment_duration_id" value="<?= htmlspecialchars($treatmentDuration['treatment_duration_id'], ENT_QUOTES); ?>" disabled></td>
  </tr>
  <tr>
    <td><label for="treatment_duration_time">Temps du Treatment Duration :</label></td>
    <td><input type="text" id="treatment_duration_time" name="treatment_duration_time" value="<?= htmlspecialchars($treatmentDuration['treatment_duration_time'], ENT_QUOTES); ?>" ></td>
  </tr>
  <tr>
    <td><label for="treatment_duration_observation">Observation du Treatment Duration :</label></td>
    <td><input type="text" id="treatment_duration_observation" name="treatment_duration_observation" value="<?= htmlspecialchars($treatmentDuration['treatment_duration_observation'], ENT_QUOTES); ?>" /></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?>
