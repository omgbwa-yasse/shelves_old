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
        $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM container_property WHERE container_property_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;

    } 
    
}
?>