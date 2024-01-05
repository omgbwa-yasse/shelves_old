<?php
require_once 'models/mail/MailReceived.class.php';
require_once 'models/mail/mailManager.class.php';

$mailReceivedManager = new mailManager();

if (isset($_POST['mail_received_id']) && isset($_POST['mail_received_date']) && isset($_POST['type_id']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) { 
    echo '<h1>UPDATED';
    $mailReceived = new MailReceived();
    $mailReceived -> updateMailReceived($_GET['id'],$_POST['mail_received_id'],$_POST['mail_received_date'], $_POST['type_id'], $_POST['mail_id'], $_POST['organization_id']);
   
}   
    $mailReceived = $mailReceivedManager ->searchMailReceivedById($_GET['id']) ;
    foreach ($mailReceived as $mailReceived) {
?>
<h1>Modifier un Courriel Reçu </h1>

<form  method="POST" action="index.php?q=mail&categ=mailReceived&sub=updateMailReceived&id=<?=$_GET['id']?>">
<table>
   <tr>
    <td><label for="mail_received_id">ID :</label></td>
    <td><input type="text" id="mail_received_id" name="mail_received_id" value="<?= htmlspecialchars($mailReceived['mail_received_id'], ENT_QUOTES); ?>" disabled></td>
  </tr>
  <tr>
    <td><label for="mail_received_date">Date de réception du Courriel Reçu :</label></td>
    <td><input type="text" id="mail_received_date" name="mail_received_date" value="<?= htmlspecialchars($mailReceived['mail_received_date'], ENT_QUOTES); ?>" ></td>
  </tr>
  <tr>
    <td><label for="type_id">ID du type :</label></td>
    <td><input type="text" id="type_id" name="type_id" value="<?= htmlspecialchars($mailReceived['type_id'], ENT_QUOTES); ?>" /></td>
  </tr>
  <tr>
    <td><label for="mail_id">ID du mail :</label></td>
    <td><input type="text" id="mail_id" name="mail_id" value="<?= htmlspecialchars($mailReceived['mail_id'], ENT_QUOTES); ?>" /></td>
  </tr>
  <tr>
    <td><label for="organization_id">ID de l'organisation :</label></td>
    <td><input type="text" id="organization_id" name="organization_id" value="<?= htmlspecialchars($mailReceived['organization_id'], ENT_QUOTES); ?>" /></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?>
