<h1>Toutes les types de prêts</h1>
<a href="index.php?q=setting&categ=loanType&sub=add">Ajouter un type</a>
<table border="1">
<th>Intitulé</th><th>Description</th><th>Prêt avec copie</th>
<?php 
require_once "models/setting/loanTypeManager.class.php";
require_once "models/setting/loanType.class.php";

$typeList = new LoanTypeManager();
$typeList = $typeList->allLoanType();
foreach($typeList as $type){
    $loanType = new LoanType();
    $loanType->hydrateById($type["id"]);

?>
        <tr>
            <td><a href="index.php?q=setting&categ=loanType&sub=view&id=<?= $loanType->getLoanTypeId();?>"><?= $loanType->getLoanTypeTitle();?></a>
            </td><td><?= $loanType->getLoanTypeObservation();?></td>
            </td><td>
            <?php 
                $booleanValue = filter_var($loanType->getLoanTypeCopy(), FILTER_VALIDATE_BOOLEAN);
                if($booleanValue == true ){ echo "Oui"; }else{ echo "Non";} 
            ?>
            </td>
        </tr>
<?php
    }
?>
</table>
