<?php
require_once 'models/connexion.class.php';

class userManager extends connexion
{
    public function getAllUserId()
    {
        $stmt = $this->getCnx()->prepare('SELECT user_id as id FROM user');
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        return $stmt;
    }
}
?>