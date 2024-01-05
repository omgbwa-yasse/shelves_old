<?php
require_once 'models/mail/mailDocNum.class.php';

$mailDocNum = new MailDocNum();

if (isset($_POST['mail_docnum_path']) && isset($_POST['mail_docnum_filename'])) {
 
    $mailDocNum -> createMailDocNum(NULL,$_POST['mail_docnum_path'], $_POST['mail_docnum_filename']);
}
?>
<h1>Créer un Mail DocNum </h1>

<form  method="POST" action="index.php?q=mail&categ=mailDocNum&sub=createMailDocNum">
<table>
  <tr>
    <td><label for="mail_docnum_path">Chemin du Mail DocNum :</label></td>
    <td><input type="text" id="mail_docnum_path" name="mail_docnum_path"></td>
  </tr>
  <tr>
    <td><label for="mail_docnum_filename">Nom de fichier du Mail DocNum :</label></td>
    <td><input type="text" id="mail_docnum_filename" name="mail_docnum_filename"></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
