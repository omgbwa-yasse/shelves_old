<?php
 require_once 'models/connexion.class.php';

 class administrator extends connexion{
  public function login(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $this->getCnx()->prepare('SELECT * FROM user WHERE user_name = :username AND user_password = :password');
    $stmt->execute(array(':username' => $username, ':password' => $password));
    if ($stmt->rowCount() == 1) {
        $_SESSION['logged_in'] = true;
        header('Location: home.php');
        exit;
    } else {
        $error = 'Invalid username or password';
        return $error;
    }
  }
  
  }

?>