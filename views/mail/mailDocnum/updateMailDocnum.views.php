<?php
require_once 'models/mail/MailDocNum.class.php';
require_once 'models/mail/mailManager.class.php';

$mailDocNumManager = new mailManager();

if (isset($_POST['mail_docnum_id']) && isset($_POST['mail_docnum_path']) && isset($_POST['mail_docnum_filename'])) { 
    echo '<h1>UPDATED';
    $mailDocNum = new MailDocNum();
    $mailDocNum -> updateMailDocNum($_GET['id'],$_POST['mail_docnum_id'],$_POST['mail_docnum_path'], $_POST['mail_docnum_filename']);
   
}   
    $mailDocNum = $mailDocNumManager ->mailDocNumByID($_GET['id']) ;
    foreach ($mailDocNum as $mailDocNum) {
?>
<h1>Modifier un  Couriels DocNum </h1>

<form  method="POST" action="index.php?q=mail&categ=mailDocNum&sub=updateMailDocNum&id=<?=$_GET['id']?>">
<table>
   <tr>
    <td><label for="mail_docnum_id">ID :</label></td>
    <td><input type="text" id="mail_docnum_id" name="mail_docnum_id" value="<?= htmlspecialchars($mailDocNum['mail_docnum_id'], ENT_QUOTES); ?>" disabled></td>
  </tr>
  <tr>
    <td><label for="mail_docnum_path">Chemin du  Couriels DocNum :</label></td>
    <td><input type="text" id="mail_docnum_path" name="mail_docnum_path" value="<?= htmlspecialchars($mailDocNum['mail_docnum_path'], ENT_QUOTES); ?>" ></td>
  </tr>
  <tr>
    <td><label for="mail_docnum_filename">Nom de fichier du  Couriels DocNum :</label></td>
    <td><input type="text" id="mail_docnum_filename" name="mail_docnum_filename" value="<?= htmlspecialchars($mailDocNum['mail_docnum_filename'], ENT_QUOTES); ?>" /></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
<?php
    }
    ?>
