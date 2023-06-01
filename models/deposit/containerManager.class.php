<?php
require_once 'models/connexion.class.php';
class containerManager extends connexion{


public function allContainer(){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container ORDER BY container_reference ASC");
    $stmt ->execute();
    $container = $stmt -> fetchAll();
    return $container;
}

public function containerUsed($id){
    $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM container WHERE container_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count > 0;
}













}?>