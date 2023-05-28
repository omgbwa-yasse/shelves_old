<?php
require_once 'models/setting/containerStateManager.class.php';

class getContainerState extends ContainerStateManager{
    
    private $_container_state_id;
    private $_container_state_title;

public function __construct(){
    $this->_container_state_id = NULL;
    $this->_container_state_title = NULL;
;
}

public function setContainerStateId($state_id){ $this->_container_state_id = $state_id;}

public function getContainerStateId(){ return $this->_container_state_id;}
    
// Container state title
public function setContainerStateTitle($state_title){ $this->_container_state_title = $state_title;}

public function getContainerStateTitle(){ return $this->_container_state_title;}
    



public function updateContainerState($id, $title){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container_state WHERE container_state_id = :id");
    $stmt -> execute([':id' => $id]);
    $container = $stmt -> fetch();
    if(isset($container)){
        $stmt = $this->getCnx() ->prepare("UPDATE container_state 
        SET container_state_id = :id, container_state_title = :title");
        $stmt -> execute([
            ':id' => $id , ':title' => $title ]);
        if($stmt->rowCount()>0)
        { return true; } 
        else {  return false; }
    } else{
        return false;
    }
}

public function setContainerStateByTitle($title){
    $stmt = $this->getCnx() ->prepare("SELECT container_state_id as id, container_state_title as title,
            container_state_lengh as lengh, container_state_width as width, _container_state_thinkness as thinkness
    FROM container_state WHERE container_state_title = :$title");
    $stmt ->execute([':title' => $title]);
    $stmt = $stmt -> fetch();
    foreach($stmt as $container){
        $this->setContainerStateId($container['id']);
        $this->setContainerStateTitle($container['title']); 
    }
}

public function setContainerStateById($id){
    $stmt = $this->getCnx() ->prepare("SELECT container_state_id as id, container_state_title as title
    FROM container_state WHERE container_state_id = :$id");
    $stmt ->execute([':title' => $id]);
    $stmt = $stmt -> fetch();
    foreach($stmt as $container){
        $this->setContainerStateId($container['id']);
        $this->setContainerStateTitle($container['title']); 
    }
}



public function saveContainerState(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO container_state(container_state_id, 
    container_state_title, container_state_width,container_state_lengh, container_state_thinkness)
    VALUES ( :id, :title, :width, :lengh, :thinkness)");
    $stmt -> execute([
        ':id' => $this-> getContainerStateId(), 
        ':title' => $this->getContainerStateTitle()]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }
}
public function containerStateUsedNumber(){
    $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM container WHERE container_state_id = :id");
    $stmt -> execute([':id' => $this->getContainerStateId()]);
    $stmt = $stmt -> fetch();
    return $stmt;
}


public function deleteContainerState(){
    if($this->containerStateUsed($this->getContainerStateId()) == false){
        $stmt = $this-> getCnx() ->prepare("DELETE FROM container_state WHERE container_state_id = :id");
        $stmt ->execute([':id' => $this->getContainerStateId()]);
        if($stmt->rowCount()>0){
            return true;
        } else {
            return false;
        }
    } else{
        return false;
    }
}

    












}?>











