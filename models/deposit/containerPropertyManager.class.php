<?php
require_once 'models/connexion.class.php';
class containerPropertyManager extends connexion{

 public function allContainerProperty(){
        $stmt = $this->getCnx() ->prepare("SELECT * FROM container_property ORDER BY container_property_title ASC");
        $stmt ->execute();
        $container = $stmt -> fetchAll();
        return $container;
    }
    
    public function containerPropertyUsed($id){
        $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM container WHERE container_property_id = :id");
        $stmt->execute([':id' => $id]);
        $count = $stmt->fetch(); 
        foreach($count as $value){
            if($value > 0){
                return true ;
            } else {
                return false;
            };
        }
    }
    
}
?>