<?php
require_once 'models/connexion.class.php';
require_once 'models/deposit/shelve.class.php';
class containerManager extends shelveManager{


public function allContainer(){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container ORDER BY container_reference DESC");
    $stmt ->execute();
    $container = $stmt -> fetchAll();
    return $container;
}


public function allContainerInShelveId(INT $id){
    $stmt = $this->getCnx() ->prepare("SELECT container_id as id 
    FROM container WHERE container_shelve_id =:id ORDER BY container_reference DESC");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt ->execute();
    $container = $stmt -> fetchAll();
    return $container;
}




public function containerUsed($id){
    $stmt = $this->getCnx() -> prepare("SELECT COUNT(*) FROM record WHERE container_id = :id");
    $stmt->execute([':id' => $id]);
    $count = $stmt->fetch();
    foreach($count as $value){
        if($value > 0){
            return true ;
        } else {
            return false;
        }
    }}
}?>