<h1>Ajouter un nouveau type de prêt</h1>
<form method="POST" action="index.php?q=setting&categ=loanType&sub=save">
<table border="0">
<tr>
    <td>Intitulé :</td>
    <td><input name="title" type="text"/></td>
</tr>
<tr>
    <td>Description :</td>
    <td><input name="observation" type="text"/></td>
</tr>
<tr>
    <td>Accès à une copie :</td>
    <td>
        <select name="copy">
            <option value="True">Oui</option>
            <option value="false">Non</option>
        </select>
    </td>
</tr>
</table>
        <input type="submit" value="Enregistrer">
        <input type="reset" value="Annuler">
</form>