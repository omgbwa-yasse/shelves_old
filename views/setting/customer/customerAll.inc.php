<?php
require_once "models/setting/customer.class.php";
require_once "models/setting/customerAddress.class.php";
require_once "models/setting/customerManager.class.php";

$list = new customerManager();
$list = $list->AllCustomer();
?>

<a href="index.php?q=setting&categ=customer&sub=add">Ajouter un utilisateur</a>
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