<?php
require_once 'models/mail/mailPriority.class.php';

$priority= new mailPriority();

if (isset($_POST['mail_priority_title']) ) {
 
    $priority -> createMailPriority(NULL,$_POST['mail_priority_title']);
    echo '<p> success </p> ';
}

?>
<h1>Creer un Niveau de Priorité </h1>

<form  method="POST" action="index.php?q=mail&categ=mailPriority&sub=create">
<table>
  <tr>
    <td><label for="mail_priority_title">Titre de la Priorité :</label></td>
    <td><input type="text" id="mail_priority_title" name="mail_priority_title"></td>
  </tr>


 <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> </table>
</form>
