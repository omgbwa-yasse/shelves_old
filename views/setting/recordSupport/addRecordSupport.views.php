
<h1>Nouveau Support</h1>
<form action="index.php?q=setting&categ=recordSupport&sub=save" method="POST">
  <div>
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="title" required>
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