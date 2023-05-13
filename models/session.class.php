<?php
 require_once 'models/connexion.class.php';

 class administrator extends connexion{
  public function login($username, $password) {
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_name = :username AND user_password = :password');
    $stmt->execute(array(':username' => $username, ':password' => $password));
    if ($stmt->rowCount() == 1) {
        $_SESSION['logged_in'] = true;
        return true;
    } else {
        return false;
    }
}
  }

?>