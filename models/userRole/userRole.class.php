<?php
require_once 'models/userRole/userRoleManager.class.php';

class userRole extends userRoleManager{

    public function roleOption($user_id){ 
        $stmt = $this->getCnx()->prepare("SELECT * FROM user 
        LEFT JOIN user_role ON user.user_id = user_role.user_id 
        LEFT JOIN user_role_option ON user.user_id = user_role_option.role_id 
        WHERE user.user_id =:id"); 
        $stmt->execute(['id' => $user_id]); 
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $stmt;
    }



}
?>