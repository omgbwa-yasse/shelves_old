<?php
require_once 'models/mail/copyType.class.php';


$copyType = new CopyType();

if ( isset($_POST['copy_type_title'])) {
    $copyType->create(NULL, $_POST['copy_type_title']);
    echo '<p> success </p> ';
}
?>

<h1>Créer un Type de Copie </h1>

<form  method="POST" action="index.php?q=mail&categ=mailCopy&sub=create">
<table>
  <tr>
    <td><label for="copy_type_title">Titre du Type de Copie :</label></td>
    <td><input type="text" id="copy_type_title" name="copy_type_title"></td>
  </tr>
  <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> 
</table>
</form>
