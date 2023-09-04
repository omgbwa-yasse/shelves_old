<?php
require_once 'models/userRole/userRole.class.php';
require_once "models/user/user.class.php";

echo "Ajouter les rôles des utilisateurs...";
?>

<form method="GET" action="#"> 
    <table>
        <tr>
        <td>
            <input type="checkbox" id="repository" name="repository" value="1"> 
            <label for="repository">repertoire</label>
        <br> 
            <input type="checkbox" id="transfer" name="transfer" value="1"> 
            <label for="transfer">versement</label>
        </td>
        <td>
            <input type="checkbox" id="option3" name="option3" value="1"> 
            <label for="option3">Communication</label>
        <br> 
            <input type="checkbox" id="audit" name="audit" value="1"> 
            <label for="audit">Audit</label>
        </td>
        <td>
            <input type="checkbox" id="deposit" name="deposit" value="1"> 
            <label for="deposit">Dépôt</label>
        <br> 
            <input type="checkbox" id="dolly" name="dolly" value="1"> 
            <label for="dolly">Chariot</label>
        </td>
        <td>
            <input type="checkbox" id="tools" name="tools" value="1"> 
            <label for="tools">Outils de gestion</label>
        <br> 
            <input type="checkbox" id="setting" name="setting" value="1"> 
            <label for="setting">Paramètre</label>
        </td>
        </tr>
        </table>
    <input type="submit">
</form>