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
  public function setcomrule_time($time){ $this->_comrule_time = $code;}
  public function setcomrule_title($title){ $this->_comrule_title = $title;}
  public function setcomrule_ref($ref){ $this->_comrule_ref = $ref;}
  public function setcomrule_class_id($class_id){ $this->_comrule_class_id = $class_id; }



public function setcomrulebyid($id){
  $stmt = $this->getCnx()->prepare("SELECT * FROM communicability WHERE communicability_id = :id");
  $stmt -> execute([':id' => $id]);
  foreach($stmt as $comrule){
      $this-> setcomrule_time($comrule['classification_code']);
      $this-> setcomrule_title($comrule['communicability_title']);
      $this-> setcomrule_ref($comrule['communicability_reference']);
      $this-> setcomrule_class_id($comrule['classification_id']);
  }
}


public function addcomrule($commrule){
    $stmt = $this ->getCnx()->prepare (" INSERT INTO communicability (  communicability_time,communicability_title, communicability_reference,classification_id) VALUE( :comrule_time , :comrule_title , :comrule_ref, :comrule_class_id");
    $stmt-> execute([ ":comrule_time" =>$comrule['communicability_time'] , ":comrule_title"=>$comrule['communicability_title']  , ":comrule_ref"=>$comrule['communicability_reference'] , ":comrule_class_id "=>$comrule['classification_id']  ]); 
                  
}

public function delcomrule($id){
    $stmt=$this->getCnx()->prepare ("DELETE FROM communicability WHERE  communicability_id = :id");
    $stmt->execute([ ":id"=> $id]);

}

}


    
    