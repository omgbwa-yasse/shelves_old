<?php
require_once 'models/mail/MailTypology.class.php';
require_once 'models/mail/mailManager.class.php';

$mailTypologyManager = new mailManager();

if (isset($_POST['mail_typology_id']) && isset($_POST['mail_typology_title']) && isset($_POST['mail_typology_observation']) && isset($_POST['activity_id']) && isset($_POST['treatment_duration_id'])) { 
    echo '<h1>UPDATED';
    $mailTypology = new MailTypology();
    $mailTypology -> updateMailTypology($_GET['id'],$_POST['mail_typology_id'],$_POST['mail_typology_title'], $_POST['mail_typology_observation'], $_POST['activity_id'], $_POST['treatment_duration_id']);
   
}   
    $mailTypology = $mailTypologyManager ->mailTypologyByID($_GET['id']) ;
    foreach ($mailTypology as $mailTypology) {
?>
<h1>Modifier un Typologie de Couriels </h1>

<form  method="POST" action="index.php?q=mail&categ=mailTypology&sub=update&id=<?=$_GET['id']?>">
<table>
   <tr>
    <td><label for="mail_typology_id">ID :</label></td>
    <td><input type="text" id="mail_typology_id" name="mail_typology_id" value="<?= htmlspecialchars($mailTypology['mail_typology_id'], ENT_QUOTES); ?>" disabled></td>
  </tr>
  <tr>
    <td><label for="mail_typology_title">Titre du Typologie de Couriels :</label></td>
    <td><input type="text" id="mail_typology_title" name="mail_typology_title" value="<?= htmlspecialchars($mailTypology['mail_typology_title'], ENT_QUOTES); ?>" ></td>
  </tr>
  <tr>
    <td><label for="mail_typology_observation">Observation du Typologie de Couriels :</label></td>
    <td><input type="text" id="mail_typology_observation" name="mail_typology_observation" value="<?= htmlspecialchars($mailTypology['mail_typology_observation'], ENT_QUOTES); ?>" /></td>
  </tr>
  <tr>
    <td><label for="activity_id">ID de l'activité :</label></td>
    <td><input type="text" id="activity_id" name="activity_id" value="<?= htmlspecialchars($mailTypology['activity_id'], ENT_QUOTES); ?>" /></td>
  </tr>
  <tr>
    <td><label for="treatment_duration_id">ID de la durée du traitement :</label></td>
    <td><input type="text" id="treatment_duration_id" name="treatment_duration_id" value="<?= htmlspecialchars($mailTypology['treatment_duration_id'], ENT_QUOTES); ?>" /></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?>
