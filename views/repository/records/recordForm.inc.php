<form action="traitement.php" method="post">
  <div class="formulaire">
    <div class="champ">
      <label for="niveau_description">Niveau de description</label>
      <select name="niveau_description" id="niveau_description" class="short">
        <option value="1">Dossier</option>
        <option value="2">Sous-dossier</option>
        <option value="3">Pièce</option>
      </select>
    </div>
    <div class="champ">
      <label for="nui">N° inventaire</label>
      <input type="text" name="nui" id="nui" class="short" >
    </div>
    <div class="champ">
      <label for="title">Intitulé / analyse</label>
      <input type="text" name="title" id="title" >
    </div>
    <div class="champ" id="authors">
      <label for="author">Producteurs</label>
      <input type="text" name="author" id="author" class="meduim">
      <button name="ajouter" id="addAuthor" onclick="">Ajouter</button>
    </div>
    
    <div class="champ" style="display:flex">
      <div style="width:250px; margin-left:10px">
        <label for="date_debut">Date de début</label>
        <input type="text" id="date_debut" class="short">
      </div>
      <div style="width:250px; margin-left:50px">
        <label for="date_fin">Date de fin</label>
        <input type="text" id="date_fin" class="short" >
      </div>
      <div style="width:250px; margin-left:50px">
        <label for="date_fin">Date exacte</label>
        <input type="date" id="date_fin" class="short bg-grey">
      </div>
    </div>
    
    <div class="champ">
      <label for="observation">Description du contenu</label>
      <textarea name="observation" id="observation"></textarea>
    </div>
    <div class="champ">
      <label for="classification">Classe</label>
      <select name="classification" id="classification" class="short">
        <option value="1">Classe 1</option>
        <option value="2">Classe 2</option>
        <option value="3">Classe 3</option>
      </select>
    </div>
    <div class="champ">
      <label for="statut">Statut</label>
      <select name="statut" id="statut" class="short">
        <option value="disponible">Disponible</option>
        <option value="communique">Communiqué</option>
        <option value="retire">Retiré</option>
      </select>
    </div>
    <div class="champ">
      <label for="support">Support</label>
      <select name="support" id="support" class="short">
        <option value="papier">Papier</option>
        <option value="numerique">Numérique</option>
      </select>
    </div>
    <div class="champ">
      <label for="mots_cles">Mots-clés</label>
      <input type="text" name="mots_cles" id="mots_cles" >
      <button name="ajouter">Ajouter</button>
    </div>
    <div class="boutons">
      <button type="submit">Envoyer</button>
      <button type="reset">Annuler</button>
    </div>
  </div>
</form>
