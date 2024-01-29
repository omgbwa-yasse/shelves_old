<?php
require_once 'models/mail/MailSend.class.php';
require_once 'models/mail/mailManager.class.php';

$mailManager = new mailManager();
if ( isset($_POST['mail_send_date']) && isset($_POST['mail_id']) && isset($_POST['organization_id'])) { 
    echo '<p>Success';
    $mailSend = new MailSend();
    $mailSend -> updateMailSend($_GET['id'],$_POST['mail_send_date'], $_POST['mail_id'], $_POST['organization_id']);
   
}   
    $mailSend = $mailManager ->searchMailSendById($_GET['id']) ;
    foreach ($mailSend as $mailSend) {
?>
<h1>Modifier un  Couriels Envoyer </h1>

<form  method="POST" action="index.php?q=mail&categ=mailSended&sub=update&id=<?=$_GET['id']?>">
<table>
   <tr>
    <td><label for="mail_send_id">ID :</label></td>
    <td><input type="text" id="mail_send_id" name="mail_send_id" value="<?= htmlspecialchars($mailSend['mail_send_id'], ENT_QUOTES); ?>" disabled></td>
  </tr>
  <tr>
    <td><label for="mail_send_date">Date d'envoi du  Couriels Envoyer :</label></td>
    <td><input type="text" id="mail_send_date" name="mail_send_date" value="<?= htmlspecialchars($mailSend['mail_send_date'], ENT_QUOTES); ?>" ></td>
  </tr>

  <tr>
    <td><label for="type_id">Entrez le type de copie  du Couriel :</label></td>
    <td> <select name="type_id">
      <?php
            $allcopytype=$mailManager->allCopyType();
            foreach($allcopytype as $copytype){
              if ($copytype['copy_type_id'] == $copytype['copy_type_id']){
                echo "<option value=\"".$copytype['copy_type_id']."\" selected>";

              }else {
                echo "<option value=\"".$copytype['copy_type_id']."\">";
              }
                
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
              if ($mail['mail_id'] == $mail['mail_id']){
                echo "<option value=\"".$mail['mail_id']."\" selected>";

              }else {
                echo "<option value=\"".$mail['mail_id']."\">";
              }
                
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
              if ($organisation['organization_id'] == $mailSend['organization_id']){
                echo "<option value=\"".$organisation['organization_id']."\" selected>";

              }else {
                echo "<option value=\"".$organisation['organization_id']."\" >";
              }
               
                echo $organisation['organization_code']."|". $organisation['organization_title'] ."</option>";
            }
      ?>
                </select></td>
  </tr>
 <tr><td><input class="btn" type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?><option value="" selected></option>
