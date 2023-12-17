<h1>Durée de Demande</h1>
<?php 
require_once "models/setting/loanDuration.class.php";
$loanDuration = new LoanDuration();
$loanDuration->hydrateById($_GET['id']);
?>
<table  border="2px">
    <tr>
        <th width="20%">intitulé</th><th>Description</th>
    </tr>
    <tr>
        <td><?= $loanDuration->getLoanDurationTitle();?></td>
        <td><?= $loanDuration->getLoanDurationObservation();?></td>
    </tr>
</table>

<a href="index.php?q=setting&categ=loanDuration&sub=update&id=<?=$_GET['id']?>"><button>Modifier</button></a>
<a href="index.php?q=setting&categ=loanDuration&sub=delete&id=<?=$_GET['id']?>"><button>Supprimer</button></a>