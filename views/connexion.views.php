<?php
require_once 'models/user/user.class.php';

    $user = new user();
    $user->setUserPseudo($_POST['pseudo']);
    $user->setUserPassword($_POST['password']);

    if ($user->connect($user->getUserPseudo(),$user->getUserPassword())){
        $_SESSION['login'] = $user->getUserPseudo();
        $_SESSION['password'] = $user->getUserPassword();
        header('Location: index.php');
    }
?>
