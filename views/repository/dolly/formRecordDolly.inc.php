<?php


?>
<form method="POST" action="index.php?q=repository&categ=dolly&sub=save">
  
  <table border="0">
    <tr>
      <td><label for="dolly_title">Titre</label> </td>
      <td><input type="text" size="70px" name="dolly_title" id="dolly_title" required /></td>
    </tr>
    <tr>
      <td><label for="dolly_observation">Description</label></td>
      <td><textarea name="dolly_observation" id="dolly_observation" rows="4" cols="70"></textarea></td>
    </tr>
  </table>
<input type="submit" name="submit" value="Envoyer"/> <input type="reset" name="Annuler" value="Annuler"/>

  
</form>