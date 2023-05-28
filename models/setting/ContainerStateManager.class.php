<?php
require_once 'models/connexion.class.php';
class containerStateManager extends connexion{

 public function allContainerState(){
        $stmt = $this->getCnx() ->prepare("SELECT * FROM container ORDER BY container_reference ASC");
        $stmt ->execute();
        $container = $stmt -> fetchAll();
        return $container;
    }
    
    public function containerStateUsed($id){
        $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM container WHERE container_state_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;

    } 
    
}
?>