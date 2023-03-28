<?php
/* require_once "models/tools/addClass.class.php";

$classe = new classe($_POST['id'],$_POST['code'],$_POST['title'],$_POST['parent'],$_POST['observation']);
*/

// Je dois mettre un si qui teste l'arrivée des données puis, je redirige ailleurs sinon, avant d'afficher
        echo "Le fichier Save est visible" ;
        echo "Votre enregistrement est : <br>";
        echo $_POST['id'].'<br>';
        echo $_POST['code'].'<br>';
        echo $_POST['title'].'<br>';
        echo $_POST['parent'].'<br>';
        echo $_POST['observation'].'<br>';
?>