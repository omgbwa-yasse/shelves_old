<?php
require_once 'models/connexion.class.php';

class LoanDurationManager extends connexion{
    public function allLoanDuration(){
        $stmt = $this->getCnx()->prepare("SELECT loan_duration_id as id  FROM loan_duration ORDER BY loan_duration_title ASC");
        $stmt ->execute();
        $stmt = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
}
?>