<?php

echo "Modifier les droits de l'utilisateur...";

require_once 'models/userRole/userRole.class.php';
require_once "models/user/user.class.php";
$userRole = new userRole();
$userRole ->setUserId($_GET['id']);
$role  =  $userRole -> getUserRoles();

echo var_dump($role);

?>

<form method="POST" action="index.php?q=setting&categ=userRole&sub=save&id=6"> 
    <table>
        <tr>
        <td>
            <input type="checkbox" id="repository" name="repository" value="1" 
            <?php if($role['role_repository'] == 1){ echo " checked"; };?>> 
            <label for="repository">repertoire</label>
        <br> 
            <input type="checkbox" id="transfer" name="transfer" value="1" 
            <?php if($role['role_transfert']== 1){ echo " checked"; };?>> 
            <label for="transfer">versement</label>
        </td>
        <td>
            <input type="checkbox" id="option3" name="communication" value="1"
            <?php if($role['role_communication'] == 1){ echo " checked"; };?>> 
            <label for="option3">Communication</label>
        <br> 
            <input type="checkbox" id="audit" name="audit" value="1"
            <?php if($role['role_audit'] == 1){ echo " checked"; };?>> 
            <label for="audit">Audit</label>
        </td>
        <td>
            <input type="checkbox" id="deposit" name="deposit" value="1"
            <?php if($role['role_room'] == 1){ echo " checked"; };?>> 
            <label for="deposit">Dépôt</label>
        <br> 
            <input type="checkbox" id="dolly" name="dolly" value="1"
            <?php if($role['role_dolly'] == 1){ echo " checked"; };?>> 
            <label for="dolly">Chariot</label>
        </td>
        <td>
            <input type="checkbox" id="tools" name="tools" value="1"
            <?php if($role['role_tool'] == 1){ echo " checked"; };?>> 
            <label for="tools">Outils de gestion</label>
        <br> 
            <input type="checkbox" id="setting" name="setting" value="1"
            <?php if($role['role_setting'] == 1){ echo " checked"; };?>> 
            <label for="setting">Paramètre</label>
        </td>
        </tr>
        </table>
    <input type="submit">
</form>

