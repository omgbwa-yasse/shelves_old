<?php
require_once 'models/tools/classification/classesManager.class.php';
class activityClass extends activityClassesManager{

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

public function setClassByCode($code){
  $stmt = $this->getCnx()->prepare("SELECT * FROM classification WHERE classification_code = :class_code");
  $stmt -> execute([':class_code' => $code]);
  foreach($stmt as $class){
      $this-> setClassId($class['classification_id']);
      $this-> setClassCode($class['classification_code']);
      $this-> setClassTitle($class['classification_title']);
      $this-> setClassObservation($class['classification_observation']);
  }
}

public function numberChildUsed(){
  $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM classification WHERE classification_parent_id = :id");
    $stmt -> execute([':id' => $this->getClassCode()]);
    $stmt = $stmt -> fetch();
    foreach($stmt as $number){
      return $number;
    }
}



public function saveClass($code,$title,$parent_id,$observation){
  if($parent_id == NULL){
      $class  = $this->getCnx()->prepare("INSERT INTO classification ( classification_code, classification_title, classification_observation) 
      VALUES (:code, :title,:observation )");
      $class  ->execute([':code' => $code, ':title' => $title,':observation' => $observation ]);
    } else{
      $mainClass  = $this->getCnx()->prepare("INSERT INTO classification ( classification_code, classification_title,classification_parent_id,classification_observation) 
      VALUES (:code, :title,:parent_id,:observation )");
      $mainClass  ->execute([':code' => $code, ':title' => $title,':parent_id' => $parent_id,':observation' => $observation ]);
    }
  }
  

  public function updateClass($id, $code, $title, $parent_id,$observation){
    // vérifier si l'id existe dans la table
    $stmt = $this->getCnx() ->prepare("SELECT * FROM classification WHERE classification_id = :id");
    $stmt -> execute([':id' => $id]);
    $classification = $stmt -> fetch();
    if($classification){
            // mettre à jour 
            $stmt = $this->getCnx() ->prepare("UPDATE classification 
            SET classification_id = :id, 
                classification_code = :code, 
                classification_title = :title,
                classification_parent_id = :parent_id,
                classification_observation = :observation 
            WHERE classification_id = :id");
            $stmt -> execute([':id' => $id,
                              ':code' => $code,
                              ':title' => $title,
                              ':parent_id' => $parent_id, 
                              ':observation' => $observation, 
                              ]);
            if($stmt->rowCount()>0){
                return true;
            } else {
                return false;
            }
    } else {
        // l'id n'existe pas, pas possible de modifier
        return false;
    }
}


public function deleteClass($id){ 
    $stmt = $this->getCnx()->prepare("DELETE FROM classification WHERE classification.classification_id = :id");
    if($stmt -> execute(['id' => $id])){
        return true;
    }else{
        return false;
    };
}


public function checkClassChildById($id){ 
  $stmt = $this->getCnx()->prepare("SELECT COUNT(*) FROM classification WHERE classification_parent_id = :id ORDER BY classification_code ASC");
  $stmt-> execute(['id' => $id]);
  foreach($stmt as $value){
          if($value>0){
              return true;
          }else{
              return false;
          }
  }
}







}?>