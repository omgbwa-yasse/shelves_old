<?php
include('models/connexion.class.php');
class classe extends connexion{
    
    private $classeId;
    private $classeCode;
    private $classeTitle;
    private $classeParent;
    private $classeObservation;
    function __construct($id,$code,$title,$parent,$observation){
        $this->classeId = $id ;
        $this->classeCode = $code ;
        $this->classeTitle = $title ;
        $this->classeParent = $parent ;
        $this->classeObservation = $observation ;
    }
    
    // Les Setters
    public function setClasseId($id){ $this->classeId = $id;}
    public function setClasseCode($code){ $this->classeCode = $code;}
    public function setClasseTitle($title){ $this->classeTitle = $title;}
    public function setClasseParent($parent){ $this->classeParent = $parent;}
    public function setClasseObservation($observation){ $this->classeObservation = $observation;}

    // les Getters
    public function getClasseId(){ return $this->classeId;}
    public function getClasseCode(){ return $this->classeCode;}
    public function getClasseTitle(){ return $this->classeTitle;}
    public function getClasseParent(){ return $this->classeParent;}
    public function getClasseObservation(){ $this->classeObservation;}
    public function deleteClasse(){}


}



?>