<h1>Nouveau Statut</h1>
<form action="index.php?q=setting&categ=containerStatus&sub=save" method="POST">
  <div>
    <label for="title">titre :</label>
    <input type="text" id="title" name="title" required>
  </div>
  <div>
    <label for="observation">Observation :</label>
    <textarea id="observation" name="observation" rows="4" cols="50"></textarea>
  </div>
  <div>
    <input type="submit" value="Envoyer">
    <input type="reset" value="Annuler">
  </div>
</form>