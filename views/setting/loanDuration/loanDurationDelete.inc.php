<?php 
require_once "models/setting/loanDuration.class.php";

echo "Rapport de suppression";

$loanDuration = new loanDuration();
$loanDuration ->hydrateById($_GET['id']);
if($loanDuration ->deleteLoanDuration()){
    echo "Suppression avec succès...";
};
?>
<a href="index.php?q=setting&categ=loanDuration&sub=all">Consulter la liste des durée de prêts</a>