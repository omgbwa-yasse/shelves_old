<?php
require_once 'models/mail/TreatmentDuration.class.php';

$treatmentDuration = new TreatmentDuration();

if (isset($_POST['treatment_duration_time']) && isset($_POST['treatment_duration_observation'])) {
 
    $treatmentDuration -> createTreatmentDuration(NULL,$_POST['treatment_duration_time'], $_POST['treatment_duration_observation']);
}
?>
<h1>Créer un Treatment Duration </h1>

<form  method="POST" action="index.php?q=mail&categ=treatmentDuration&sub=createTreatmentDuration">
<table>

  <tr>
    <td><label for="treatment_duration_time">Temps de Traitement :</label></td>
    <td><input type="text" id="treatment_duration_time" name="treatment_duration_time"></td>
  </tr>
  <tr>
    <td><label for="treatment_duration_observation">Observation  :</label></td>
    <td><input type="text" id="treatment_duration_observation" name="treatment_duration_observation"></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
