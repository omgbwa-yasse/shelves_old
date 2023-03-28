<?php
include('models/connexion.class.php');
class classe extends connexion{
    
    private $classeId;
    private $classeCode;
    private $classeTitle;
    private $classeObservation;
    private function __construct($id,$code,$title,$observation){
        $this->classeId = $id ;
        $this->classeCode = $code ;
        $this->classeTitle = $title ;
        $this->classeObservation = $observation ;
    }
    public function setClasseId($id){ $this->classeId = $id;}
    public function setClasseCode($code){ $this->classeCode = $code;
        $id = $this->classeId;
        $requete = "UPDATE classe_code FROM classification VALUES ($id)";
        connexion()->execute($requete);
    }
    public function setClasseTitle($title){ $this->classeTitle = $title;}
    public function setClasseObservation($observation){ $this->classeObservation = $observation;}
    public function saveClasse(){
        $id = NULL; 
        $code = $this->classeCode; 
        $title = $this->classeTitle; 
        $observation = $this->classeObservation; 
        $requete = "INSERT INTO classification VALUES($id, $code, $title, $observation)";
        // new connexion->execute ($requete);
    }


}



?>