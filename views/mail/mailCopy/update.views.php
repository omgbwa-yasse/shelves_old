<?php
require_once 'models/mail/copyType.class.php';


$copyType = new CopyType();

if (isset($_POST['copy_type_id']) && isset($_POST['copy_type_title'])) { 
    echo '<h1>UPDATED';
    $copyType->update($_GET['id'], $_POST['copy_type_title']);
}   
?>

<h1>Modifier un Type de Copie</h1>

<form  method="POST" action="index.php?q=mail&categ=mailCopy&sub=update&id=<?php echo $_GET['id']; ?>">
<table>
  <tr>
    <td><label for="copy_type_title">Titre du Type de Copie :</label></td>
    <td><input type="text" id="copy_type_title" name="copy_type_title"></td>
  </tr>
  <tr><td><input type="submit" value="Submit"></td>   <td><input type="reset" value="Annuler"></td></tr> 
</table>
</form>
