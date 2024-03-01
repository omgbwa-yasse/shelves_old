<?php
 require_once 'models/connexion.class.php';

 class administrator extends connexion{
  public function login($username, $password) {
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_name = :username AND user_password = :password');
    $stmt->execute(array(':username' => $username, ':password' => $password));
    $user= $stmt->fetchAll();
    if ($stmt->rowCount() == 1) {

        $_SESSION['logged_in'] = true;
     
        return true;
    } else {
        return false;
    }
}

public function userExist($pseudo) {
  $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_name = :username');
  $stmt->execute(array(':username' => $pseudo));
  $userSpeudo = $stmt->fetch();
  if ($userSpeudo['user_name'] == $pseudo) {
    return true;
  }else{
    return false;
  }
}

}?>