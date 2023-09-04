<?php
require_once "models/user/user.class.php";
$list = new user();
$list = $list ->getAllUserId();
?>
<a href="index.php?q=setting&categ=user&sub=add">Ajouter un utilisateur</a>
<table>
        <?php
        echo "<tr>
                <th> Login <th> Nom(s) <th>option
            </tr>";
        foreach($list as $id){
            $user = new user();
            $user->hydrateById($id['id']);
            echo "<tr>";
            echo "<td>";
                echo $user->getUserPseudo() ."<br/>";
            echo "</td>";
            echo "<td>";
                echo $user->getUserName()."<br/>";
            echo "</td>";
            echo "<td>";
                echo "<a href=\"index.php?q=setting&categ=user&sub=view&id=". $user->getUserId() ."\">voir+</a>";
            echo "</td>";
            echo "</tr>";
        }?>
    
</table>