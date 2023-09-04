<?php 
require_once 'models/user/user.class.php';
$user = new user(); $_POST['password'] = NULL;
$user->createUserSand(); 
if($_POST['password1'] == $_POST['password2'])
{ 
    $user->setPasswordByCrypt($_POST['password1']); 
}
$user->setUserPseudo($_POST['pseudo']); 
$user->setUserName($_POST['name']); 
$user->setUserSurname($_POST['surname']); 
$user->setUserBirthday($_POST['birthday']); 
$user->saveUser(); 
$userbd = new user(); 
$userbd->setUserPseudo($_POST['pseudo']); 
$userbd->setUserSandByPseudo(); 
$userbd->setPasswordByCrypt($_POST['password1']); 
$userbd->connect(); 
$userbd->hydrateByPseudo($_POST['pseudo']); 
header('Location: index.php?q=setting&categ=userRole&sub=add&id='.$userbd->getUserId()); 
?>