<?php
require_once 'models/mail/MailContainer.class.php';

$mailContainer = new MailContainer();

if (isset($_POST['mail_container_reference']) && isset($_POST['mail_container_title']) && isset($_POST['mail_container_type_id'])) {
 
    $mailContainer -> createMailContainer(NULL,$_POST['mail_container_reference'],$_POST['mail_container_title'], $_POST['mail_container_type_id']);
}
?>
<h1>Créer un Conteneur de Couriels </h1>

<form  method="POST" action="index.php?q=mail&categ=mailContainer&sub=createMailContainer">
<table>
  <tr>
    <td><label for="mail_container_reference">Référence du Conteneur de Couriels :</label></td>
    <td><input type="text" id="mail_container_reference" name="mail_container_reference"></td>
  </tr>
  <tr>
    <td><label for="mail_container_title">Titre du Conteneur de Couriels :</label></td>
    <td><input type="text" id="mail_container_title" name="mail_container_title"></td>
  </tr>
  <tr>
    <td><label for="mail_container_type_id">Type ID du Conteneur de Couriels :</label></td>
    <td><input type="number" id="mail_container_type_id" name="mail_container_type_id"></td>
  </tr>
 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
