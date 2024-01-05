<?php
require_once 'models/mail/MailSend.class.php';
require_once 'models/mail/mailManager.class.php';

$mailSendManager = new mailManager();

if (isset($_POST['mail_send_id']) && isset($_POST['mail_send_date']) && isset($_POST['type_id']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) { 
    echo '<h1>UPDATED';
    $mailSend = new MailSend();
    $mailSend -> updateMailSend($_GET['id'],$_POST['mail_send_id'],$_POST['mail_send_date'], $_POST['type_id'], $_POST['mail_id'], $_POST['organization_id']);
   
}   
    $mailSend = $mailSendManager ->searchMailSendById($_GET['id']) ;
    foreach ($mailSend as $mailSend) {
?>
<h1>Modifier un Mail Send </h1>

<form  method="POST" action="index.php?q=mail&categ=mailSend&sub=updateMailSend&id=<?=$_GET['id']?>">
<table>
   <tr>
    <td><label for="mail_send_id">ID :</label></td>
    <td><input type="text" id="mail_send_id" name="mail_send_id" value="<?= htmlspecialchars($mailSend['mail_send_id'], ENT_QUOTES); ?>" disabled></td>
  </tr>
  <tr>
    <td><label for="mail_send_date">Date d'envoi du Mail Send :</label></td>
    <td><input type="text" id="mail_send_date" name="mail_send_date" value="<?= htmlspecialchars($mailSend['mail_send_date'], ENT_QUOTES); ?>" ></td>
  </tr>
  <tr>
    <td><label for="type_id">ID du type :</label></td>
    <td><input type="text" id="type_id" name="type_id" value="<?= htmlspecialchars($mailSend['type_id'], ENT_QUOTES); ?>" /></td>
  </tr>
  <tr>
    <td><label for="mail_id">ID du mail :</label></td>
    <td><input type="text" id="mail_id" name="mail_id" value="<?= htmlspecialchars($mailSend['mail_id'], ENT_QUOTES); ?>" /></td>
  </tr>
  <tr>
    <td><label for="organization_id">ID de l'organisation :</label></td>
    <td><input type="text" id="organization_id" name="organization_id" value="<?= htmlspecialchars($mailSend['organization_id'], ENT_QUOTES); ?>" /></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?>
