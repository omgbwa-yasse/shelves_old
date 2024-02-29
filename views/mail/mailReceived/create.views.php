<?php

require_once 'models/mail/mailReceived.class.php';

$mailReceived = new MailReceived();

if ( isset($_POST['mail_received_date']) && isset($_POST['type_id']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) {
    $mailReceived->createMailReceived(NULL, $_POST['mail_received_date'], $_POST['type_id'], $_POST['mail_id'], $_POST['organization_id']);
    echo '<p> success </p> ';
}
?>

<h1>Create a new Mail Received</h1>

<form  method="POST" action="index.php?q=mail&categ=mailReceived&sub=create">
<table>
  <tr>
    <td><label for="mail_received_date">Mail Received Date:</label></td>
    <td><input type="datetime-local" id="mail_received_date" name="mail_received_date"></td>
  </tr>
  <tr>
    <td><label for="type_id">Type ID:</label></td>
    <td><input type="number" id="type_id" name="type_id"></td>
  </tr>
  <tr>
    <td><label for="mail_id">Mail ID:</label></td>
    <td><input type="number" id="mail_id" name="mail_id"></td>
  </tr>
  <tr>
    <td><label for="organization_id">Organization ID:</label></td>
    <td><input type="number" id="organization_id" name="organization_id"></td>
  </tr>
  <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> 
</table>
</form>
