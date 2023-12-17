<h1>Toutes les durées de prêt</h1>
<a href="index.php?q=setting&categ=loanDuration&sub=add">Ajouter un type</a>
<?php 
require_once "models/setting/loanDurationManager.class.php";
require_once "models/setting/loanDuration.class.php";

$typeList = new LoanDurationManager();
$durationList = $durationList->allLoanDuration();
echo var_dump($durationList);
foreach($durationList as $duration){
    echo $duration["id"];
}

?>