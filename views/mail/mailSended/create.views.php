<?php
require_once 'models/mail/MailSend.class.php';
require_once 'models/mail/mailManager.class.php';
$mailManager= new mailManager();
$mailSend = new MailSend();

if (isset($_POST['mail_send_date']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) {
 
    $true =$mailSend -> createMailSend($_POST['mail_send_date'], $_POST['mail_id'], $_POST['organization_id']);
    echo  $true;
}
?>
<h1>Transferer un  Couriels </h1>

<form  method="POST" action="index.php?q=mail&categ=mailSended&sub=create">
<table>
  <tr>
    <td><label for="mail_send_date">Date d'envoi du  Couriels Envoyer :</label></td>
    <td><input type="date" id="mail_send_date" name="mail_send_date"></td>
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
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
