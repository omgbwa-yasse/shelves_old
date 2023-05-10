<?php





?>
<form method="POST" action="index.php?q=repository&categ=dolly&sub=save">
  <label for="dolly_title">Titre</label>
  <input type="text" size="70px" name="dolly_title" id="dolly_title" required /><br>
  <label for="dolly_observation">Description</label>
  <textarea name="dolly_observation" id="dolly_observation" rows="4" cols="70"></textarea><br>
  <input type="submit" name="submit" value="Envoyer"/>
</form>