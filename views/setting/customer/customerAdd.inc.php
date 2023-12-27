<?php

?>
<form method="POST" action="index.php?q=setting&categ=customer&sub=save">
    <fieldset>
        <legend>Renseignements : </legend>
        <table>
        <tr><td>Nom d'utilisateur :</td><td><input  type="text" name="pseudo" required></td></tr>
        <tr><td>Nom : </td><td><input  type="text" name="name" required></td></tr>
        <tr><td>Prenom :</td><td><input  type="text" name="surname"></td></tr>
        <tr><td>Genre :</td><td><input  type="text" name="gender"></td></tr>
        <tr><td>Mot de passe :</td><td><input  type="password" name="password1" required></td></tr>
        <tr><td>retaper le Mot de passe :</td><td><input  type="password" name="password2" required></td></tr>
        <tr><td>Année naissance :</td><td><input  type="date" name="birthday" required></td></tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Contact : </legend>
        <table>
            <tr><td>Adresse : </td><td><input  type="text" name="location" required></td></tr>
            <tr><td>téléphone 1 :</td><td><input  type="text" name="phone1"></td></tr>
            <tr><td>téléphone 2 :</td><td><input  type="text" name="phone2"></td></tr>
            <tr><td>Email 1 :</td><td><input  type="text" name="email1"></td></tr>
            <tr><td>Email 2 :</td><td><input  type="text" name="email2"></td></tr>
        </table>    
    </fieldset>
    <input type="submit" value="Enregistrer"><input type="reset" value="Annuler">
</form>
