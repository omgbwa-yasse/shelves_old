<?php
require_once 'models/deposit/containerPropertyManager.class.php';

class containerProperty extends containerPropertyManager{
    
    private $_container_property_id;
    private $_container_property_title;
    private $_container_property_width;
    private $_container_property_lengh;
    private $_container_property_thinkness;

public function __construct(){
    $this->_container_property_id = NULL;
    $this->_container_property_title = NULL;
    $this->_container_property_width = NULL;
    $this->_container_property_lengh = NULL;
    $this->_container_property_thinkness = NULL;
}

public function setContainerPropertyId($property_id){ $this->_container_property_id = $property_id;}

public function getContainerPropertyId(){ return $this->_container_property_id;}
    
// Container property title
public function setContainerPropertyTitle($property_title){ $this->_container_property_title = $property_title;}

public function getContainerPropertyTitle(){ return $this->_container_property_title;}
    
// Container property width
public function setContainerPropertyWidth($property_width){ $this->_container_property_width = $property_width;}

public function getContainerPropertyWith(){ return $this->_container_property_width;}

// Container property lengh
public function setContainerPropertyLengh($property_lengh){ $this->_container_property_lengh = $property_lengh;}

public function getContainerPropertyLengh(){ return $this->_container_property_lengh;}

// Container property thinkness
public function setContainerPropertyThinkness($property_thinkness){ $this->_container_property_thinkness = $property_thinkness;}

public function getContainerPropertyThinkness(){ return $this->_container_property_thinkness;}


public function updateContainerProperty($id, $title, $width, $lengh, $thinkness){
    $stmt = $this->getCnx() ->prepare("SELECT * FROM container_property WHERE container_property_id = :id");
    $stmt -> execute([':id' => $id]);
    $container = $stmt -> fetch();
    if(isset($container)){
        $stmt = $this->getCnx() ->prepare("UPDATE container_property 
        SET container_property_id = :id, container_property_title = :title, container_property_lengh = :lengh,
        container_property_width = :width, container_property_thinkness = :thinkness WHERE container_property_id = :id");
        $stmt -> execute([
            ':id' => $id , ':title' => $title, 'width' => $width, 
            'lengh' => $lengh, 'thinkness' => $thinkness ]);
        if($stmt->rowCount()>0)
        { return true; } 
        else {  return false; }
    } else{
        return false;
    }
}

public function setContainerPropertyByTitle($title){
    $stmt = $this->getCnx() ->prepare("SELECT container_property_id as id, container_property_title as title,
            container_property_lengh as lengh, container_property_width as width, _container_property_thinkness as thinkness
    FROM container_property WHERE container_property_title = :$title");
    $stmt ->execute([':title' => $title]);
    $stmt = $stmt -> fetch();
    foreach($stmt as $container){
        $this->setContainerPropertyId($container['id']);
        $this->setContainerPropertyTitle($container['title']); 
        $this->setContainerPropertyLengh($container['lengh']);
        $this->setContainerPropertyWidth($container['width']);
        $this->setContainerPropertyThinkness($container['thinkness']);
    }
}

public function setContainerPropertyById($id){
    $stmt = $this->getCnx() ->prepare("SELECT container_property_id as id, 
            container_property_title as title,
            container_property_lengh as lengh, 
            container_property_width as width, 
            container_property_thinkness as thinkness
    FROM container_property WHERE container_property_id = :id");
    $stmt ->execute([':id' => $id]);
    $stmt = $stmt -> fetchAll();
    foreach($stmt as $container){
        $this->setContainerPropertyId($container['id']);
        $this->setContainerPropertyTitle($container['title']); 
        $this->setContainerPropertyLengh($container['lengh']);
        $this->setContainerPropertyWidth($container['width']);
        $this->setContainerPropertyThinkness($container['thinkness']);
    }
}



public function saveContainerProperty(){
    $stmt = $this->getCnx() ->prepare("INSERT INTO container_property(container_property_id, 
    container_property_title, container_property_width,container_property_lengh, container_property_thinkness)
    VALUES ( :id, :title, :width, :lengh, :thinkness)");
    $stmt -> execute([
        ':id' => $this-> getContainerPropertyId(), 
        ':title' => $this->getContainerPropertyTitle(),  
        ':width' => $this-> getContainerPropertyWith(), 
        ':lengh' => $this-> getContainerPropertyLengh(), 
        ':thinkness' => $this->getContainerPropertyThinkness()]);
    if($stmt->rowCount()>0){
        return true;
    } else {
        return false;
    }
}
public function containerPropertyUsedNumber(){
    $stmt = $this->getCnx() ->prepare("SELECT COUNT(*) FROM container WHERE container_property_id = :id");
    $stmt -> execute([':id' => $this->getContainerPropertyId()]);
    $stmt = $stmt -> fetch();
    return $stmt;
}


public function deleteContainerProperty(){
    if($this->containerPropertyUsed($this->getContainerPropertyId()) == false){
        $stmt = $this-> getCnx() ->prepare("DELETE FROM container_property WHERE container_property_id = :id");
        $stmt ->execute([':id' => $this->getContainerPropertyId()]);
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











