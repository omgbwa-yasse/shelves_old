<h1>Type de Demande</h1>
<?php 
require_once "models/setting/loanType.class.php";
$loanType = new LoanType();
$loanType->hydrateById($_GET['id']);
?>
<table  border="2px">
    <tr>
        <th>intitulé</th><th>Description</th><th>Prêt avec copie</th>
    </tr>
    <tr>
        <td><?= $loanType->getLoanTypeTitle();?></td>
        <td><?= $loanType->getLoanTypeObservation();?></td>
        <td>
            <?php 
                $booleanValue = filter_var($loanType->getLoanTypeCopy(), FILTER_VALIDATE_BOOLEAN);
                if($booleanValue == true ){ echo "Oui"; }else{ echo "Non";} 
            ?>
        </td>

    </tr>
</table>

<a href="index.php?q=setting&categ=loanType&sub=update&id=6"><button>Modifier</button></a>
<a href="index.php?q=setting&categ=loanType&sub=delete&id=6"><button>Supprimer</button></a>