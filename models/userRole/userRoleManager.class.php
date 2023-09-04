<?php
require_once 'models/connexion.class.php';
class userRoleManager extends connexion{

public function getAllUserRole(){
    $stmt = $this->getCnx()->prepare("SELECT user_id FROM user_role");
    
}







}