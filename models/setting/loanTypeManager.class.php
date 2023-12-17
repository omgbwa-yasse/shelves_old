<?php
require_once 'models/connexion.class.php';

class LoanTypeManager extends connexion{
    public function allLoanType(){
        $stmt = $this->getCnx()->prepare("SELECT loan_type_id as id  FROM loan_type ORDER BY loan_type_title ASC");
        $stmt ->execute();
        return $stmt ->fetchAll();
    }
}
?>