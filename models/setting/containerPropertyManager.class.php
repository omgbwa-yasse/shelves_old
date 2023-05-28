<?php
require_once 'models/connexion.class.php';
class containerPropertyManager extends connexion{

 public function allContainerProperty(){
        $stmt = $this->getCnx() ->prepare("SELECT * FROM container ORDER BY container_reference ASC");
        $stmt ->execute();
        $container = $stmt -> fetchAll();
        return $container;
    }
    
    public function containerPropertyUsed($id){
        $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM container WHERE container_property_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;

    } 
    
}
?>