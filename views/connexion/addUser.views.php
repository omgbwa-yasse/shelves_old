<?php
require_once 'models/mail/mailManager.class.php';
$mailManager= new mailManager();
?>
<table>
<form method="POST" action="index.php?q=session&categ=user&sub=addControl">
    <tr><td>Pseudo </td><td><input  type="text" name="pseudo" required></td></tr>
    <tr><td>Nom  </td><td><input  type="text" name="name" required></td></tr>
    <tr><td>Prenom </td><td><input  type="text" name="surname"></td></tr>
    <tr><td>Mot de passe </td><td><input  type="password" name="password1" required></td></tr>
    <tr><td>retaper le Mot de passe </td><td><input  type="password" name="password2" required></td></tr>
    <tr><td>Année naissance</td><td><input  type="date" name="birthday" required></td></tr>
    <tr>
    <td><label for="organization_id">Entrez le Nom de votre organisation :</label></td>
    <td> <select name="organization_id">
      <?php
            $allorganisation =$mailManager->allorganisation();
            foreach($allorganisation as $organisation){
                echo "<option value=\"".$organisation['organization_id']."\">";
                echo $organisation['organization_code']."|". $organisation['organization_title'] ."</option>";
            }
      ?>
                </select></td>
  </tr>
    <tr><td><input  type="submit" name="enregistrer"></tr>
</form>
</table>