<?php
require_once 'models/mail/mailReceived.class.php';
require_once 'models/mail/mailManager.class.php';
$mailManager= new mailManager();
$mailReceived = new MailReceived();

if ( isset($_POST['mail_received_date']) && isset($_POST['copy_type_id']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) {
    $mailReceived->createMailReceived(NULL, $_POST['mail_received_date'], $_POST['copy_type_id'], $_POST['mail_id'], $_POST['organization_id']);
    echo '<p> success </p> ';
}
?>

<h1>Recevoir un Couriel</h1>

<form  method="POST" action="index.php?q=mail&categ=mailReceived&sub=receive">
<table>
  <tr>
    <td><label for="mail_received_date">Mail Received Date:</label></td>
    <td><input type="datetime-local" id="mail_received_date" name="mail_received_date"></td>
  </tr>
  <tr>
    <td><label for="copy_type_id">Entrez le Type de copy :</label></td>
    <td> <select name="copy_type_id">
      <?php
            $allcopytype =$mailManager->allCopyType();
            foreach($allcopytype as $copytype){
                echo "<option value=\"".$copytype['copy_type_id']."\">";
                echo $copytype['copy_type_title'] ."</option>";
            }
      ?>
                </select></td>
  </tr>
  <tr>
    <td><label for="mail_id">Entrez la Reference  du Couriel :</label></td>
    <td> <select name="mail_id">
      <?php
            $allMail=$mailManager->allMail();
            foreach($allMail as $mail){
                echo "<option value=\"".$mail['mail_id']."\">";
                echo $mail['mail_reference'] ."</option>";
            }
      ?>
                </select></td>
  </tr>
  <tr>
    <td><label for="organization_id">Entrez le Nom du receveur :</label></td>
    <td> <select name="organization_id">
      <?php
            $allorganisation =$mailManager->allorganisation();
            foreach($allorganisation as $organisation){
                echo "<option value=\"".$organisation['organization_id']."\">";
                echo $organisation['organization_code']."|". $organisation['organization_title'] ."</option>";
            }
      ?>
                </select></td>
  </tr>
  <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> 
</table>
</form>
