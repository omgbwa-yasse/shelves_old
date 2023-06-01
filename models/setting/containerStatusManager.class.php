<?php
require_once 'models/connexion.class.php';
class containerStatusManager extends connexion{

 public function allContainerStatus(){
        $stmt = $this->getCnx() ->prepare("SELECT * FROM container_status ORDER BY container_status_title ASC");
        $stmt ->execute();
        $container = $stmt -> fetchAll();
        return $container;
    }
    
    public function containerStatusUsed($id){
        $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM container_status WHERE container_status_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;

    } 
    
}
?>