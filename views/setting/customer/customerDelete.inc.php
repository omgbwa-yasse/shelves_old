<?php

    require_once "models/user/user.class.php";
    $user = new user();
    $user ->hydrateById($_GET['id']);
    $pseudo = $user ->getUserPseudo();
    $password = $user ->getUserPassword();
    if($user->deleteUser($pseudo, $password))
    {
        echo "Utilisateur : " . $pseudo;
        echo "<br/> a été suprimé.";
    }
    ;




    

?>