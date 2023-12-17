<h1>Enregistrement...</h1>

<?php

if(isset($_GET["id"])){
     require_once "models/setting/loanType.class.php"; 
     $loanType = new LoanType();
     $loanType->setLoanTypeId($_GET['id']);
     $loanType->setLoanTypeTitle($_POST['title']);
     $loanType->setLoanTypeObservation($_POST['observation']);
     $loanType->setLoanTypeCopy($_POST['copy']);
     if($loanType->updateLoanType()){
          echo "Mise à jour effectuée";
     };

}else{
     require_once "models/setting/loanType.class.php"; 
     $loanType = new LoanType();
     $loanType->setLoanTypeTitle($_POST['title']);
     $loanType->setLoanTypeObservation($_POST['observation']);
     $loanType->setLoanTypeCopy($_POST['copy']);
     if($loanType->saveLoanType()){
          echo "Enregistrée avec succès...";
     }
}

     
?>

<a href="index.php?q=setting&categ=loanType&sub=all">Consulter la liste des types de prêts</a>
<br>
<a href="index.php?q=setting&categ=loanType&sub=add">Ajouter un autre type de prêt</a>