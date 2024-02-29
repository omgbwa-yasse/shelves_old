<?php
require_once 'models/mail/MailTypology.class.php';

$mailTypology = new MailTypology();

if ( isset($_POST['mail_typology_title']) && isset($_POST['mail_typology_observation'])) {
 
    $mailTypology -> createMailTypology(NULL,$_POST['mail_typology_title'], $_POST['mail_typology_observation']);
    echo '<p> success </p> ';
}
?>
<h1>Créer un Typologie de Couriels </h1>

<form  method="POST" action="index.php?q=mail&categ=mailTypology&sub=create">
<table>
 
  <tr>
    <td><label for="mail_typology_title">Titre du Typologie de Couriels :</label></td>
    <td><input type="text" id="mail_typology_title" name="mail_typology_title"></td>
  </tr>
  <tr>
    <td><label for="mail_typology_observation">Observation du Typologie de Couriels :</label></td>
    <td><input type="text" id="mail_typology_observation" name="mail_typology_observation"></td>
  </tr>

 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
