<?php

require_once 'models/mail/mailReceived.class.php';
require_once 'models/mail/mailManager.class.php';
$mailreceived= new mailreceived();
$mailManager = new mailManager();

if (isset($_POST['mail_received_date']) && isset($_POST['type_id']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) { 
    echo '<h1>UPDATED';
    $mailReceived->updateMailReceived($_GET['id'], $_POST['mail_received_date'], $_POST['type_id'], $_POST['mail_id'], $_POST['organization_id']);
}   

$mailReceivedDetails = $mailManager->searchMailReceivedById($_GET['id']);
foreach ($mailReceivedDetails as $mailReceivedDetail) {
?>

<h1>Update a Mail Received</h1>

<form  method="POST" action="index.php?q=mailReceived&sub=update&id=<?=$_GET['id']?>">
<table>
   <tr>
    <td><label for="mail_received_date">Mail Received Date:</label></td>
    <td><input type="datetime-local" id="mail_received_date" name="mail_received_date" value="<?= htmlspecialchars($mailReceivedDetail['mail_received_date'], ENT_QUOTES); ?>"></td>
  </tr>
  <tr>
    <td><label for="type_id">Type ID:</label></td>
    <td><input type="number" id="type_id" name="type_id" value="<?= htmlspecialchars($mailReceivedDetail['type_id'], ENT_QUOTES); ?>"></td>
  </tr>
  <tr>
    <td><label for="mail_id">Mail ID:</label></td>
    <td><input type="number" id="mail_id" name="mail_id" value="<?= htmlspecialchars($mailReceivedDetail['mail_id'], ENT_QUOTES); ?>"></td>
  </tr>
  <tr>
    <td><label for="organization_id">Organization ID:</label></td>
    <td><input type="number" id="organization_id" name="organization_id" value="<?= htmlspecialchars($mailReceivedDetail['organization_id'], ENT_QUOTES); ?>"></td>
  </tr>
  <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> 
</table>
</form>
<?php
}
?>
