<?php
require 'models/connexion.class.php';
class classification extends connexion{
public    $AllClassCodeTitle ;
public function __construct(){
  echo "";
}
public function getAllClassTitle(){
    $allClassTitle = "SELECT classification.classification_id as id,classification.classification_code_title as code_title  FROM classification";
    $allClassTitle = $this->getCnx()->prepare($allClassTitle);
    $allClassTitle->execute();
    return $allClassTitle;
    }

public function getAllrecordsIdClasse($id){
    $idClasse = "SELECT *  FROM records LEFT JOIN records_classification 
    ON records_classification.classification_id = ?";
    $idClasse = $this->getCnx()->prepare('$id');
    $idClasse->execute($id);
    foreach($idClasse as $classe_id){
       echo $classe_id['id_records'] ;
       echo $classe_id['records_title'] ;
       echo $classe_id['classification_id'] ;
    }
}
}
?>