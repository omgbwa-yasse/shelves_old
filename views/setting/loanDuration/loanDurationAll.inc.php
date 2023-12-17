<h1>Toutes les durées de prêt</h1>
<table border="3">

<th width="20%">Durée(jour)</th><th>Description</th>

<a href="index.php?q=setting&categ=loanDuration&sub=add">Ajouter un type</a>
<?php 
require_once "models/setting/loanDurationManager.class.php";
require_once "models/setting/loanDuration.class.php";

$typeList = new loanDurationManager();
$durationList = $typeList -> allLoanDuration();

foreach($durationList as $data){
    $duration = new loanDuration();
    $duration ->hydrateById($data["id"]);
?>
<tr>
    <td>
        <a href="index.php?q=setting&categ=loanDuration&sub=view&id=<?= $duration->getLoanDurationid() ?>">
            <?= $duration->getLoanDurationTitle() ?>
        </a>
    </td>
    <td><?= $duration->getLoanDurationObservation() ?></td>
</tr>
<?php
}
?>
</table>