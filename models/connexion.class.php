<?php
 abstract class connexion{
    private static $cnx;

    private static function setCnx(){
        self::$cnx = new PDO("mysql:host=localhost;dbname=dbms;charset=utf8","root", "");
            self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    protected function getCnx(){
        if(self::$cnx===null) { self::setCnx(); }
        return self::$cnx;
    }
    }

  class session extends connexion{
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