<?php
require_once 'models/tools/classification/class.class.php';
require_once 'models/tools/classification/classesManager.class.php';

if(isset($_POST['parent_id'])){
    $class = new activityClass();
    $class -> saveClass($_POST['code'],$_POST['title'],$_POST['parent_id'],$_POST['observation']);
    echo "Classe classe ok...";
}else if(isset($_GET['id'])){
    $class = new activityClass();
    $class -> updateClass($_GET['id'],$_POST['code'],$_POST['title'],$_POST['parent_id'],$_POST['observation']);
    echo "mise à jour effectué...";
}else{
    $class = new activityClass();
    $class -> saveClass($_POST['code'],$_POST['title'],NULL,$_POST['observation']);
    echo "Classe branche ok...";
}

?>