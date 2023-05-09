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

public function getClasseId(){ return $this->_classe_id;}
public function getClasseCode(){ return $this->_classe_code;}
public function getClasseTitle(){ return $this->_classe_title;}
public function getClasseParentId(){ return $this->_classe_parent_id;}
public function getClasseObservation(){ return $this->_classe_observation;}

public function setClasseId($id){ $this->_classe_id = $id;}
public function setClasseCode($code){ $this->_classe_code = $code;}
public function setClassetitle($title){ $this->_classe_title = $title;}
public function setClasseParentId($id){ $this->_classe_parent_id = $id;}
public function setClasseObservation($observation){ $this->_classe_observation = $observation; }

public function setClasseById(){
  $rqt = "SELECT * FROM classification";
  $rqt = $this->getCnx()->prepare($rqt);
  $rqt -> execute();
  foreach($rqt as $classe){
      $this-> setClasseId($classe['classification_id']);
      $this-> setClasseCode($classe['classification_code']);
      $this-> setClasseTitle($classe['classification_title']);
      $this-> setClasseObservation($classe['classification_observation']);
  }
}

public function addClasse(){
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