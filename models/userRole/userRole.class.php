<?php
require_once 'models/userRole/userRoleManager.class.php';

class userRole extends userRoleManager{

    public function roleOption($user_id){ 
        $stmt = $this->getCnx()->prepare("SELECT * FROM user_role 
            LEFT JOIN user_role_option ON user_role.role_id = user_role_option.role_id 
            WHERE user_role.user_id =:id");
        $stmt->execute(['id' => $user_id]); 
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $stmt; 
    }

}
?>