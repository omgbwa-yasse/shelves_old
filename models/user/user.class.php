<?php
require_once 'models/connexion.class.php';

class user extends connexion{
    private $_user_pseudo;
    private $_user_password;
    private $_user_id;
    private $_user_name;
    private $_user_surname;
    private $_user_sand;
    private $_user_birthday;

    public function __construct(){
        $this->_user_pseudo;
        $this->_user_password;
        $this->_user_name;
        $this->_user_surname;
        $this->_user_id;
        $this->_user_sand;
        $this->_user_birthday;
    }
    public function getUserSand(){ return $this->_user_sand;}
    public function createUserSand(){
        $this->_user_sand = sha1(rand(1,1000)."G2D".time().rand(1,1000));
    }

    public function setUserSand($sand){ $this->_user_sand = $sand; }
    
    public function setUserName($name){ $this->_user_name = $name;}
    public function getUserName(){ return $this->_user_name;}
    public function setUserSurname($surname){ $this->_user_surname = $surname;}
    public function getUserSurname(){ return $this->_user_surname;}

    public function setUserBirthday($birthday){ $this->_user_birthday = $birthday;}
    public function getUserBirthday(){ return $this->_user_birthday;}
    public function setPasswordByCrypt($password){ 
        $this->_user_password = sha1(sha1($password).$this->getUserSand());
    }
 
    public function setUserSandByPseudo() {
        $stmt = $this->getCnx()->prepare('SELECT user_sand FROM user WHERE user_pseudo = :pseudo');
        $stmt->execute([':pseudo' => $this->getUserPseudo()]);
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            $this->setUserSand($row['user_sand']);
            return true;
        } else {
            return false;
        }
    }
    public function getUserId() { return $this->_user_id; }

    public function setUserId($id) { $this->_user_id = $id; }

    public function getUserPseudo() { return $this->_user_pseudo; }

    public function setUserPseudo($Pseudo) {  $this->_user_pseudo = $Pseudo; }

    public function getUserPassword() {  return $this->_user_password;}

    public function setUserPassword($password) { $this->_user_password = $password; }

   function password_compare($pass1,$pass2){
        if($pass1 == $pass2){
            return TRUE;
        }else{ 
            return FALSE;
        }
   }
   public function passwordVerification() {
    $stmt = $this->getCnx()->prepare('SELECT user_password FROM user WHERE user_pseudo = :user_pseudo');
    $stmt->execute([':user_pseudo' => $this->getUserPseudo()]);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        return password_verify($this->getUserPassword(), $row['user_password']);
    } else {
        return false;
    }
}
    
    public function userExists() {
        $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_pseudo = :user_pseudo');
        $stmt->execute([':user_pseudo' => $this->getUserPseudo()]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function connect(){
        if($this->userExists() && $this->passwordVerification()){
            $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_pseudo = :user_pseudo AND user_password = :user_password');
            $stmt->execute([':user_pseudo' => $this->getUserPseudo(), ':user_password' => $this->getUserPassword()]);
            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $user) {
                    $this->setUserId($user['user_id']);
                    $this->setUserPseudo($user['user_pseudo']);
                    $this->setUserPassword($user['user_password']);
                    $this->setUserSand($user['user_sand']);
                    $this->setUserBirthday($user['user_birthday']);
                }
                return true;
            } else {
                return false;
            }
        }
    }

    public function changePassword($user_pseudo, $newPassword) {
        $stmt = $this->getCnx()->prepare('UPDATE user SET user_password = :newPassword WHERE user_pseudo = :user_pseudo');
        $stmt->execute([':newPassword' => $newPassword, ':user_pseudo' => $user_pseudo]);
    }

    public function changePseudo($user_pseudo, $newPseudo) {
        $stmt = $this->getCnx()->prepare('UPDATE user SET user_pseudo = :newPseudo WHERE user_pseudo = :user_pseudo');
        $stmt->execute([':newPseudo' => $newPseudo, ':user_pseudo' => $user_pseudo]);
    }
    public function saveUser(){
        $stmt = $this->getCnx()->prepare("INSERT INTO user(user_pseudo,user_name,user_surname,user_password, user_sand, user_birthday) VALUES(:user_pseudo,:user_name,:user_surname,:user_password,:user_sand,:user_birthday)");
        $stmt->execute([
            ':user_pseudo' => $this->getUserPseudo(),
            ':user_name' => $this->getUserName(),
            ':user_surname' => $this->getUserSurname(),
            ':user_password' => $this->getUserPassword(),
            ':user_sand' => $this->getUserSand(),
            ':user_birthday' => $this->getUserBirthday()
        ]);
        return $stmt->rowCount() > 0;
    }
    public function deleteUser($user_pseudo, $user_password) {
        $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_pseudo = :user_pseudo AND user_password = :user_password');
        $stmt->execute([':user_pseudo' => $user_pseudo, ':user_password' => $user_password]);
        if ($stmt->rowCount() > 0) {
            $stmt = $this->getCnx()->prepare('DELETE FROM user WHERE user_pseudo = :user_pseudo AND user_password = :user_password');
            $stmt->execute([':user_pseudo' => $user_pseudo, ':user_password' => $user_password]);
            return true;
        } else {
            return false;
        }
    }

}

?>