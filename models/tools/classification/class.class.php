<?php
require_once 'models/tools/classification/classesManager.class.php';
class activityClasse extends activityClassesManager{

  private $_classe_id;
  private $_classe_code;
  private $_classe_title;
  private $_classe_parent_id;
  private $_classe_observation;

public function __construct(){
  $this->_classe_id = NULL;
  $this->_classe_code = NULL;
  $this->_classe_title = NULL;
  $this->_classe_parent_id = NULL;
  $this->_classe_observation = NULL;
}

public function getClassId(){ return $this->_classe_id;}
public function getClassCode(){ return $this->_classe_code;}
public function getClassTitle(){ return $this->_classe_title;}
public function getClassParentId(){ return $this->_classe_parent_id;}
public function getClassObservation(){ return $this->_classe_observation;}

public function setClassId($id){ $this->_classe_id = $id;}
public function setClassCode($code){ $this->_classe_code = $code;}
public function setClasstitle($title){ $this->_classe_title = $title;}
public function setClassParentId($id){ $this->_classe_parent_id = $id;}
public function setClassObservation($observation){ $this->_classe_observation = $observation; }

public function setClassById($id){
  $stmt = $this->getCnx()->prepare("SELECT * FROM classification WHERE classification_id = :class_id");
  $stmt -> execute([':class_id' => $id]);
  foreach($stmt as $class){
      $this-> setClassId($class['classification_id']);
      $this-> setClassCode($class['classification_code']);
      $this-> setClassTitle($class['classification_title']);
      $this-> setClassObservation($class['classification_observation']);
  }
}
public function numberChildUsed(){
  $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM classification WHERE classification_parent_id = :id");
    $stmt -> execute([':id' => $this->getClassId()]);
    $stmt = $stmt -> fetch();
    foreach($stmt as $number){
      return $number;
    }
}



public function addClass(){
  $sql = "INSERT INTO classification (
      classification_id,
      classification_code,
      classification_title,
      classification_code_title,
      classification_type,
      classification_parent_id,
      classification_type_id,
      classification_observation) 
      VALUES ( NULL, :classification_code, :classification_title, NULL, NULL, :classification_parent_id,
      3,:classification_observation )";
  
      $allClasse = $this->getCnx()->prepare($sql);
      $allClasse->execute([
      ':classification_code' => $_POST['classification_code'],
      ':classification_title' => $_POST['classification_title'],
      ':classification_parent_id' => $_POST['classification_parent_id'],
      ':classification_observation' => $_POST['classification_observation'] ]);
  }
  

}





?>