<?php
require_once 'models/mail/MailReceived.class.php';

$mailReceived = new MailReceived();

if (isset($_POST['mail_received_id']) && isset($_POST['mail_received_date']) && isset($_POST['type_id']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) {
 
    $mailReceived -> createMailReceived(NULL,$_POST['mail_received_id'],$_POST['mail_received_date'], $_POST['type_id'], $_POST['mail_id'], $_POST['organization_id']);
}
?>
<h1>Créer un Courriel Reçu </h1>

<form  method="POST" action="index.php?q=mail&categ=mailReceived&sub=createMailReceived">
<table>
  <tr>
    <td><label for="mail_received_id">ID du Courriel Reçu :</label></td>
    <td><input type="text" id="mail_received_id" name="mail_received_id"></td>
  </tr>
  <tr>
    <td><label for="mail_received_date">Date de réception du Courriel Reçu :</label></td>
    <td><input type="text" id="mail_received_date" name="mail_received_date"></td>
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
