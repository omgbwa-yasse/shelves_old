<?php
require_once 'models/mail/MailSend.class.php';

$mailSend = new MailSend();

if (isset($_POST['mail_send_id']) && isset($_POST['mail_send_date']) && isset($_POST['type_id']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) {
 
    $mailSend -> createMailSend(NULL,$_POST['mail_send_id'],$_POST['mail_send_date'], $_POST['type_id'], $_POST['mail_id'], $_POST['organization_id']);
}
?>
<h1>Créer un Mail Send </h1>

<form  method="POST" action="index.php?q=mail&categ=mailSend&sub=createMailSend">
<table>
  <tr>
    <td><label for="mail_send_id">ID du Mail Send :</label></td>
    <td><input type="text" id="mail_send_id" name="mail_send_id"></td>
  </tr>
  <tr>
    <td><label for="mail_send_date">Date d'envoi du Mail Send :</label></td>
    <td><input type="text" id="mail_send_date" name="mail_send_date"></td>
  </tr>
  <tr>
    <td><label for="type_id">ID du type :</label></td>
    <td><input type="text" id="type_id" name="type_id"></td>
  </tr>
  <tr>
    <td><label for="mail_id">ID du mail :</label></td>
    <td><input type="text" id="mail_id" name="mail_id"></td>
  </tr>
  <tr>
    <td><label for="organization_id">ID de l'organisation :</label></td>
    <td><input type="text" id="organization_id" name="organization_id"></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
