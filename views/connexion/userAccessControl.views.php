<?php
require_once 'models/user/user.class.php';

if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    echo "Donnée arrivées";
    $user = new user();
    $user->setUserPseudo($_POST['pseudo']);
    $user->setUserSandByPseudo();
    $user->setPasswordByCrypt($_POST['password']);
    $user->setUserSandByPseudo();
    echo "<br/>";
    echo $user->getUserPseudo();
    echo "<br/>";
    echo $user->getUserPassword();
    echo "<br/>";
    echo $user->getUserSand();
    echo "<br/>";
    if ($user->connect()) {
        var_dump($user);
        echo "<hr>";
        echo $user->getUserPseudo();
        echo $user->getUserPassword();
        echo "Bonjour ...." . $_POST['pseudo'];
    }
} else {
    header('Location: index.php?q=connexion&categ=user&sub=form');
}  
?>
