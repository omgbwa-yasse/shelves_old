<?php
require_once 'models/user/user.class.php';

if(isset($_POST['pseudo']) != NULL && isset($_POST['password']) != NULL){
        $user = new user();
        $user->setUserPseudo($_POST['pseudo']);
        $user->setUserPassword($_POST['password']);
        
        if ($user->connect($user->getUserPseudo(),$user->getUserPassword())){
            $_SESSION['pseudo'] = $user->getUserPseudo();
            $_SESSION['password'] = $user->getUserPassword();
            header('index.php?q=repertory&categ=search&sub=allrecords');
        }

} else{
    header('index.php?q=connexion&categ=user&sub=form');
}
    
?>
