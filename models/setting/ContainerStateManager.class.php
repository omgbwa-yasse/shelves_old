<?php
require_once 'models/connexion.class.php';
class containerStateManager extends connexion{

 public function allContainerState(){
        $stmt = $this->getCnx() ->prepare("SELECT * FROM container_state ORDER BY container_state_type ASC");
        $stmt ->execute();
        $container = $stmt -> fetchAll();
        return $container;
    }
    
    public function containerStateUsed($id){
        $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM container_state WHERE container_state_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;

    } 
    
}
?>