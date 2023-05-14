<?php
require_once 'models/user/user.class.php';

$user = new user();
//Initialisation du mot de passe
$_POST['password'] = NULL;

// Création du mot de passe
if($_POST['password1'] == $_POST['password2']){
    $user->setPasswordByCrypt($_POST['password1']);
}

// Savegarde des données
$user->setUserPseudo($_POST['pseudo']);
$user->setUserName($_POST['name']);
$user->setUserSurname($_POST['surname']);
$user->setUserBirthday($_POST['birthday']);
$user->createUserSand();
$user->saveUser();

echo "<hr>";
    $userbd = new user();
    $userbd->setUserPseudo($_POST['pseudo']);
    $userbd->setUserSandByPseudo();
    $userbd->setPasswordByCrypt($_POST['password1']);
    $userbd->connect();
    echo $userbd->getUserPseudo();
    echo $userbd->getUserSurname();
    echo $userbd->getUserName();

?>


