<?php 
require_once "models/setting/loanType.class.php";

echo "Rapport de suppression";

$loanType = new loanType();
$loanType ->hydrateById($_GET['id']);
if($loanType ->deleteLoanType()){
    echo "Suppression avec succès...";
};
?>
<a href="index.php?q=setting&categ=loanType&sub=all">Consulter la liste des types de prêts</a>