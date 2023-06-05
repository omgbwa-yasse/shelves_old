<?php
require_once "models/deposit/containerProperty.class.php";
if(isset($_GET['id'])){
     $containerPropertyUpdate = new containerProperty();
    if($containerPropertyUpdate -> updateContainerProperty($_GET['id'],$_POST['title'], $_POST['width'],$_POST['lengh'],$_POST['thinkness'])){
        header('Location: index.php?q=deposit&categ=containerProperty&sub=all'); }
}else{
    if(isset($_POST['title']) && isset($_POST['width']) && isset($_POST['lengh'])&& isset($_POST['thinkness']) ){
        $containerProperty = new containerProperty();
        $containerProperty ->setContainerPropertyTitle($_POST['title']);
        $containerProperty ->setContainerPropertyWidth($_POST['width']);
        $containerProperty ->setContainerPropertyLengh($_POST['lengh']);
        $containerProperty ->setContainerPropertyThinkness($_POST['thinkness']);
        if($containerProperty->saveContainerProperty()){
            $containerProperty ->setContainerPropertyByTitle($_POST['title']);
            header('Location: index.php?q=deposit&categ=containerProperty&sub=view&id='. $containerProperty->getContainerPropertyId());
            }else{
                echo "Echec enregistrement...<br>";
            }
        }
    }
?>
