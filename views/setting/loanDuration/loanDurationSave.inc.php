<?php
if(isset($_GET["id"])){
     echo "<h1>Rapport de mise à jour</h1>";
     require_once "models/setting/loanDuration.class.php"; 
     $loanDuration = new LoanDuration();
     $loanDuration->setLoanDurationId($_GET['id']);
     $loanDuration->setLoanDurationTitle($_POST['duration']);
     $loanDuration->setLoanDurationObservation($_POST['observation']);
     if($loanDuration->updateLoanDuration()){
          echo "Mise à jour effectuée...";
     };

}else{
     echo "<h1>Rapport de sauvergarde</h1>";
     require_once "models/setting/loanDuration.class.php"; 
     $loanDuration = new LoanDuration();
     $loanDuration->setLoanDurationTitle($_POST['duration']);
     $loanDuration->setLoanDurationObservation($_POST['observation']);
     if($loanDuration->saveLoanDuration()){
          echo "Enregistrée avec succès...";
     }
}     
?>

<a href="index.php?q=setting&categ=loanDuration&sub=all">Consulter la liste des types de prêts</a>
<br>
<a href="index.php?q=setting&categ=loanDuration&sub=add">Ajouter un autre type de prêt</a>