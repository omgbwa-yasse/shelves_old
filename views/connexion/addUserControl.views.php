
<html>
<head>
        <title>My Shelves</title>
        <link href="template/css/style.css" rel="stylesheet">
</head>
        <body>
<center>
<?php
require_once 'models/user/user.class.php';

$user = new user();
//Initialisation du mot de passe
$_POST['password'] = NULL;

// Création du mot de passe
$user->createUserSand();
if($_POST['password1'] == $_POST['password2']){
    $user->setPasswordByCrypt($_POST['password1']);
}

// Sauvegarde des autres données
$user->setUserPseudo($_POST['pseudo']);
$user->setUserName($_POST['name']);
$user->setUserSurname($_POST['surname']);
$user->setUserBirthday($_POST['birthday']);
$user->setOrganizationId($_POST['organization_id']);
$user->saveUser();

echo "<div class=\"connexion\">";
    $userbd = new user();
    $userbd->setUserPseudo($_POST['pseudo']);
    $userbd->setUserSandByPseudo();
    $userbd->setPasswordByCrypt($_POST['password1']);
    $userbd->connect();
    echo "<br/>Id : ". $userbd->getUserId();
    echo "<br/>Bonjour : ". $userbd->getUserPseudo();
    echo "<br/>votre prénom est :" . $userbd->getUserSurname();
    echo "<br/>Votre nom est :". $userbd->getUserName();
    echo "<br/>Grain sable est :". $userbd->getUserSand();

echo "</div>";
?>


