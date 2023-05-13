<?php
require_once 'models/connexion.class.php';

class user extends connexion{
    private $_user_pseudo;
    private $_user_password;
    private $_user_id;

    private $_user_rock;

    public function __construct(){
        $this->_user_pseudo;
        $this->_user_password;
        $this->_user_id;
        $this->_user_rock;
    }
    private function getRock(){ return $this->_user_rock;}
    private function setRock(){
        $this->_user_rock = sha1(rand(1,1000)."G2D".time().rand(1,1000));
    }
    private function crypt(){ }
    private function decrypt(){}
    public function getUserId() { return $this->_user_id; }

    public function setUserId($id) { $this->_user_id = $id; }

    public function getUserPseudo() { return $this->_user_pseudo; }

    public function setUserPseudo($Pseudo) {  $this->_user_pseudo = $Pseudo; }

    public function getUserPassword() {  return $this->_user_password;}

    public function setUserPassword($password) { $this->_user_password = $password; }

    public function userExists($peudo) {
        $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_pseudo = :user_pseudo');
        $stmt->execute([':user_pseudo' => $peudo]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function connect() {
        $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_pseudo = :user_pseudo AND user_user_password = :user_user_password');
        $stmt->execute([':user_pseudo' => $this->getUserPseudo(), ':user_user_password' => $this->getUserPassword()]);
        if ($stmt->rowCount() > 0) {
            foreach($stmt as $user){
            $this->setUserId($user['user_id']);
            $this->setUserPseudo($user['user_pseudo']);
            $this->setUserPassword($user['user_password']);
            // Gerer l'organisation de l'utilisateur
        }
            return true;
        } else {
            return false;
        }
    }

    public function changePassword($user_pseudo, $newPassword) {
        $stmt = $this->getCnx()->prepare('UPDATE user SET user_user_password = :newPassword WHERE user_pseudo = :user_pseudo');
        $stmt->execute([':newPassword' => $newPassword, ':user_pseudo' => $user_pseudo]);
    }

    public function changePseudo($newPseudo) {
        $stmt = $this->getCnx()->prepare('UPDATE user SET user_pseudo = :newPseudo WHERE user_pseudo = :user_pseudo');
        $stmt->execute([':newPassword' => $this->getUserPassword(), ':user_pseudo' => $this->getUserPseudo()]);
    }

    public function deleteUser($user_pseudo, $user_password) {
        $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_pseudo = :user_pseudo AND user_user_password = :user_user_password');
        $stmt->execute([':user_pseudo' => $user_pseudo, ':user_user_password' => $user_password]);
        if ($stmt->rowCount() > 0) {
            $stmt = $this->getCnx()->prepare('DELETE FROM user WHERE user_pseudo = :user_pseudo AND user_user_password = :user_user_password');
            $stmt->execute([':user_pseudo' => $user_pseudo, ':user_user_password' => $user_password]);
            return true;
        } else {
            return false;
        }
    }


}

?>