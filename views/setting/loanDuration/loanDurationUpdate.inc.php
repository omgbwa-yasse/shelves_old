<h1>Modifier la durée d'un prêt</h1>

<?php 
require_once "models/setting/loanDuration.class.php";
$loanDuration = new LoanDuration();
$loanDuration->hydrateById($_GET['id']);
?>
<form method="POST" action="index.php?q=setting&categ=loanDuration&sub=save&id=<?=$_GET['id']?>">
<table border="0">
<tr>
    <td>Intitulé :</td>
    <td><input name="duration" value="<?= $loanDuration->getLoanDurationTitle();?>" type="text"/></td>
</tr>
<tr>
    <td>Description :</td>
    <td><input name="observation" value="<?= $loanDuration->getLoanDurationObservation();?>" type="text"/></td>
</tr>
</table>
        <input type="submit" value="Enregistrer">
        <input type="reset" value="Annuler">
</form>