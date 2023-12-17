<h1>Modifier un type de prêt</h1>

<?php 
require_once "models/setting/loanType.class.php";
$loanType = new LoanType();
$loanType->hydrateById($_GET['id']);
?>

<form method="POST" action="index.php?q=setting&categ=loanType&sub=save&id=<?=$_GET['id']?>">
<table border="0">
<tr>
    <td>Intitulé :</td>
    <td><input name="title" value="<?= $loanType->getLoanTypeTitle();?>" type="text"/></td>
</tr>
<tr>
    <td>Description :</td>
    <td><input name="observation" value="<?= $loanType->getLoanTypeObservation();?>" type="text"/></td>
</tr>
<tr>
    <td>Accès à une copie :</td>
    <td>
        <select name="copy">
            <option value="True" <?php  if(!$loanType->getLoanTypeCopy()){ echo "selected"; } ?>> 
                Oui
            </option>
            <option value="False" <?php  if($loanType->getLoanTypeCopy()){ echo "selected"; } ?>>
                Non
            </option>
        </select>
    </td>
</tr>
</table>
        <input type="submit" value="Enregistrer">
        <input type="reset" value="Annuler">
</form>