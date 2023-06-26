<?php
require_once 'models/connexion.class.php';

class comrule extends connexion{


    private $_comrule_id;
    private $_comrule_time;
    private $_comrule_title;
    private $_comrule_ref;
    private $_comrule_class_id;
  
  public function __construct(){
    $this->_comrule_id = NULL;
    $this->_comrule_time = NULL;
    $this->_comrule_title = NULL;
    $this->_comrule_ref = NULL;
    $this->_comrule_class_id = NULL;
  }
  
  public function getcomrule_id(){ return $this->_comrule_id;}
  public function getcomrule_time(){ return $this->_comrule_time;}
  public function getcomrule_title(){ return $this->_comrule_title;}
  public function getcomrule_ref(){ return $this->_comrule_ref;}
  public function getcomrule_class_id(){ return $this->_comrule_class_id;}
  
  public function setcomrule_id($id){ $this->_comrule_id = $id;}
  public function setcomrule_time($time){ $this->_comrule_time = $time;}
  public function setcomrule_title($title){ $this->_comrule_title = $title;}
  public function setcomrule_ref($ref){ $this->_comrule_ref = $ref;}
  public function setcomrule_class_id($class_id){ $this->_comrule_class_id = $class_id; }



public function setcomrulebyid($id){
  $stmt = $this->getCnx()->prepare("SELECT * FROM communicability WHERE communicability_id = :id");
  $stmt -> execute([':id' => $id]);
  foreach($stmt as $comrule){
    $this-> setcomrule_id($comrule['communicability_id']);
      $this-> setcomrule_time($comrule['communicability_time']);
      $this-> setcomrule_title($comrule['communicability_title']);
      $this-> setcomrule_ref($comrule['communicability_reference']);
      $this-> setcomrule_class_id($comrule['classification_id']);
  }
}

public function updatecomrule() {
    
    
    $stmt =$this->getCnx()->prepare("UPDATE communicability SET communicability_time=:comrule_time, communicability_title=:comrule_title, communicability_reference=:comrule_ref, classification_id=:comrule_class_id WHERE communicability_id=:comrule_id");

// Execute the statement with the values from the form fields
$stmt->execute([
  ":comrule_time" => $_POST['communicability_time'],
  ":comrule_title" => $_POST['communicability_title'],
  ":comrule_ref" => $_POST['communicability_reference'],
  ":comrule_class_id" => $_POST['classification_id'],
  ":comrule_id" => $_POST['communicability_id']
]);

  }

  public function addcomrule() {
    
    $stmt = $this->getCnx()->prepare("INSERT INTO communicability (communicability_time, communicability_title, communicability_reference, classification_id) VALUES (:comrule_time, :comrule_title, :comrule_ref, :comrule_class_id)");
    $stmt->execute([
      ":comrule_time" => $_POST['communicability_time'],
      ":comrule_title" => $_POST['communicability_title'],
      ":comrule_ref" => $_POST['communicability_reference'],
      ":comrule_class_id" => $_POST['classification_id']
    ]);
  }

public function delcomrule($id){
    $stmt=$this->getCnx()->prepare ("DELETE FROM communicability WHERE  communicability_id = :id");
    $stmt->execute([ ":id"=> $id]);

}

public function allcomrule(){
    $stmt= $this ->getCnx()->prepare( "SELECT * FROM communicability");
    $allrule= $stmt->execute();
    $allrule= $stmt->fetchAll();
    return $allrule;
}
}


    
    