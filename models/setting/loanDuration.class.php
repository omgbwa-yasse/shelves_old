<?php
require_once 'models/setting/loanDurationManager.class.php';

class LoanDuration extends LoanDurationManager{
    private $_id;
    private $_title;
    private $_observation;

    
    public function __construct(){
        $this->_id  = Null;
        $this->_title = Null;
        $this->_observation = Null;
    }

    // id
    public function getLoanDurationId(){ return $this->_id; }
    public function setLoanDurationId($id){ $this->_id = $id; }
    
    
    // title
    public function getLoanDurationTitle(){ return $this->_title; }
    public function setLoanDurationTitle($title){ $this->_title = $title; }
    
    // Observation
    public function getLonaDurationObservation(){ return $this->_observation; }
    public function setLoanDurationObservation($observation){ $this->_observation= $observation;}
    
// enregistrer

public function saveLoanDuration(){
    $stmt = $this->getCnx()->prepare("INSERT INTO loan_duration (loan_duration_title, loan_duration_observation)VALUES (:title, :observation)");
    $stmt->bindParam(":title", $this->_title, PDO::PARAM_STR);
    $stmt->bindParam(":observation", $this->_observation, PDO::PARAM_STR);
    if($stmt->execute()){
        return true;
    };
}

// supprimer une durée
public function deleteLoanDuration(){
    $stmt = $this->getCnx()->prepare("DELETE FROM loan_duration WHERE loan_duration_id =?");
    $stmt->bindParam(":id", $this->_id, PDO::PARAM_INT);
    if($stmt->execute()){
        return true;
    }
}

//Mise à jour
public function updateLoanDuration(){
    $stmt = $this->getCnx()->prepare("UPDATE loan_duration SET (loan_duration_title, loan_duration_observation) VALUE(:title, :observation) WHERE loan_duration_id =:id");
    $stmt->bindParam(":title", $this->_title, PDO::PARAM_STR);
    $stmt->bindParam(":observation", $this->_observation, PDO::PARAM_STR);
    $stmt->bindParam(":id", $this->_id, PDO::PARAM_INT);
    if($stmt->execute()){
        return true;
    }
}

// hydrate {
public function hydrateById(INT $id){
    $stmt=$this->getCnx()->prepare("SELECT loan_duration_id as id, loan_duration_title as title, loan_duration_observation as observation FROM loan_duration WHERE loan_duration_id =:id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt=$stmt->fetch(PDO::FETCH_ASSOC);
    foreach($stmt as $data){
        $this->setLoanDurationId($data['id']);
        $this->setLoanDurationTitle($data['title']);
        $this->setLoanDurationObservation($data['observation']);
    }

}

}

?>