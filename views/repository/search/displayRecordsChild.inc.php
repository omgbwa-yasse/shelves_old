<?php
require_once "models/repository/keywordsManager.class.php";
require_once "models/repository/keyword.class.php";
require_once "views/repository/records/display.inc.php";

echo "Je vais afficher le records child de <br>";
echo $_GET['id'];
$listId = new recordsManager();
$listId -> getAllSubRecordsIdById($_GET['id']);

foreach($listId as $id){
    echo "<br> ceci : ". $id['id'];
}


?>