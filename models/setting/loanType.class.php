<?php
require_once 'models/connexion.class.php';
class LoanType extends connexion{
private $_id;
private $_title;
private $_observation;
private $_type_copy;

public function __construct(){
    $this->_id  = Null;
    $this->_title = Null;
    $this->_observation = Null;
    $this->_type_copy = Null;
}
// id
public function getLoanTypeId(){ return $this->_id; }
public function setLoanTypeId($id){ $this->_id = $id; }


// title
public function getLoanTypeTitle(){ return $this->_title; }
public function setLoanTypeTitle($title){ $this->_title = $title; }

// Observation
public function getLoanTypeObservation(){ return $this->_observation; }
public function setLoanTypeObservation($observation){ $this->_observation= $observation;}

// copy
public function setLoanTypeCopy($copy){  $this->_type_copy  = filter_var($copy, FILTER_VALIDATE_BOOLEAN); }
public function getLoanTypeCopy(){ return $this->_type_copy; }

// enregistrer

public function saveLoanType(){
    $stmt = $this->getCnx()->prepare("INSERT INTO loan_type (loan_type_title, loan_type_observation, loan_type_copy)VALUES (:title, :observation, :type_copy)");
    $stmt->bindParam(":title", $this->_title, PDO::PARAM_STR);
    $stmt->bindParam(":observation", $this->_observation, PDO::PARAM_STR);
    $stmt->bindParam(":type_copy", $this->_type_copy, PDO::PARAM_STR);
    if($stmt->execute()){
        return true;
    };
}

// supprimer une durée
public function deleteLoanType() {
    try {
        $sql = "DELETE FROM loan_type WHERE loan_type_id = :id";
        $stmt = $this->getCnx()->prepare($sql);
        $values = [':id' => $this->getLoanTypeId()];
        if ($stmt->execute($values)) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}



//Mise à jour
public function updateLoanType() {
    try {
        $stmt = $this->getCnx()->prepare("UPDATE loan_type SET loan_type_title = :title, loan_type_observation = :observation, loan_type_copy = :type_copy WHERE loan_type_id = :id");
        $values = [':title' => $this->getLoanTypeTitle(), ':observation' => $this->getLoanTypeObservation(), ':type_copy' => $this->getLoanTypeCopy(),':id' => $this->getLoanTypeId()];
        if ($stmt->execute($values)) {
            return true;
        } else {
            return false;
        }
    }catch(PDOException $e) {
        return false;
    }
}

// hydrate {
public function createCustomerAddress($customer_address_id, $customer_address_phone1, 
            $customer_address_phone2, $customer_address_email1, 
            $customer_address_email2, $customer_address_location) {
    $sql = "INSERT INTO customer_address (customer_address_id, customer_address_phone1, 
            customer_address_phone2, customer_address_email1, 
            customer_address_email2, customer_address_location)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->getCnx()->prepare($sql);
    $stmt->execute([$customer_address_id, $customer_address_phone1, 
            $customer_address_phone2, $customer_address_email1, 
            $customer_address_email2, $customer_address_location]);
    }
    

}
?>