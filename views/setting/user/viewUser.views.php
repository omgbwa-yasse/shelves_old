<?php
require_once 'models/userRole/userRole.class.php';
require_once "models/user/user.class.php";

$user = new user();
$user->hydrateById($_GET['id']);
?>
<table style="border: 1px solid red; margin-bottom:20px;">
<tr>
    <th> Nom </th><td><?= $user->getUserPseudo() ?></td>
</tr>
<tr>
    <th> Prénom </th><td><?= $user->getUserSurname() ?></td>
</tr>
<tr>
    <th> Année naissance</th><td><?= $user->getUserBirthday() ?></td>
</tr>
</table>
<ol>
    <?php
        $service = new userRole();
        $service -> setUserId($user->getUserId());
        $list = $service->getUserRoles();
        foreach($list as $option){
            var_dump($option);
        }
    ?>
</ol>




<div style="display:inline;margin:0px 40px 0px 0px;">
    <a href="index.php?q=setting&categ=user&sub=update&id=<?=$user->getUserId()?>">Modifier</a>
    <a href="index.php?q=setting&categ=user&sub=delete&id=<?=$user->getUserId()?>">Supprimer</a>
    <a href="index.php?q=setting&categ=userRole&sub=update&id=<?=$user->getUserId()?>">Gerer les droits</a>
</div>