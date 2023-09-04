<?php
require_once 'models/user/user.class.php';

if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    $user = new user();
    $user->setUserPseudo($_POST['pseudo']);
    $user->setUserSandByPseudo();
    $user->setPasswordByCrypt($_POST['password']);

    if ($user->connect()) {
        setcookie("pseudo", $user->getUserPseudo(), time()+1800);
        // Je stocke le nom dans un cookie
        header('Location: index.php?q=repository&categ=search&sub=allrecords');    
        }else{
            if($user->passwordVerification() == false && $user->userExists() == true){
                header('Location: index.php?q=session&categ=user&sub=form&error=1'); }
            else{
                header('Location: index.php?q=session&categ=user&sub=form&error=2');
        }
    } 
} else {
    header('Location: index.php?q=session&categ=user&sub=form');
}  
?>
