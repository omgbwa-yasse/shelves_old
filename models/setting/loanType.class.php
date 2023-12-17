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
public function setLoanTypeCopy($copy){ $this->_type_copy = $copy;}
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
public function deleteLoanType(){
    $stmt = $this->getCnx()->prepare("DELETE FROM loan_type WHERE loan_type_id =?");
    $stmt->bindParam(":id", $this->_id, PDO::PARAM_INT);
    if($stmt->execute()){
        return true;
    }
}

//Mise à jour
public function updateLoanType(){
    $stmt = $this->getCnx()->prepare("UPDATE loan_type SET (loan_type_title, loan_type_observation, loan_type_copy) VALUE(:title, :observation, :type_copy) WHERE loan_type_id =:id");
    $stmt->bindParam(":title", $this->_title, PDO::PARAM_STR);
    $stmt->bindParam(":observation", $this->_observation, PDO::PARAM_STR);
    $stmt->bindParam(":type_copy", $this->_type_copy, PDO::PARAM_STR);
    $stmt->bindParam(":id", $this->_id, PDO::PARAM_INT);
    if($stmt->execute()){
        return true;
    }
}

// hydrate {
public function hydrateById(INT $id){
    $stmt=$this->getCnx()->prepare("SELECT loan_type_id as id, loan_type_title as title, loan_type_observation as observation, loan_type_copy as type_copy FROM loan_type WHERE loan_type_id =:id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt=$stmt->fetch(PDO::FETCH_ASSOC);
    foreach($stmt as $data){
        $this->setLoanTypeId($data['id']);
        $this->setLoanTypeTitle($data['title']);
        $this->setLoanTypeObservation($data['observation']);
        $this->setLoanTypeCopy($data['type_copy']);
    }

}



}
?>