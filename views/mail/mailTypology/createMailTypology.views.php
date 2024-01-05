<?php
require_once 'models/mail/MailTypology.class.php';

$mailTypology = new MailTypology();

if ( isset($_POST['mail_typology_title']) && isset($_POST['mail_typology_observation']) && isset($_POST['activity_id']) && isset($_POST['treatment_duration_id'])) {
 
    $mailTypology -> createMailTypology(NULL,$_POST['mail_typology_title'], $_POST['mail_typology_observation'], $_POST['activity_id'], $_POST['treatment_duration_id']);
}
?>
<h1>Créer un Mail Typology </h1>

<form  method="POST" action="index.php?q=mail&categ=mailTypology&sub=createMailTypology">
<table>
 
  <tr>
    <td><label for="mail_typology_title">Titre du Mail Typology :</label></td>
    <td><input type="text" id="mail_typology_title" name="mail_typology_title"></td>
  </tr>
  <tr>
    <td><label for="mail_typology_observation">Observation du Mail Typology :</label></td>
    <td><input type="text" id="mail_typology_observation" name="mail_typology_observation"></td>
  </tr>
  <tr>
    <td><label for="activity_id">ID de l'activité :</label></td>
    <td><input type="text" id="activity_id" name="activity_id"></td>
  </tr>
  <tr>
    <td><label for="treatment_duration_id">ID de la durée du traitement :</label></td>
    <td><input type="text" id="treatment_duration_id" name="treatment_duration_id"></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
