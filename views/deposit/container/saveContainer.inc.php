<?php
require_once "models/deposit/container.class.php";

if(isset($_GET['id'])){
    $containerUpdate = new container();
    if($containerUpdate -> updateContainer($_GET['id'],$_POST['reference'], $_POST['state_id'], $_POST['shelve_id'], $_POST['property_id']))
    { header('Location: index.php?q=deposit&categ=container&sub=all'); }
}else{
        if(isset($_POST['reference']) && isset($_POST['state_id']) && isset($_POST['shelve_id']) && isset($_POST['property_id'])){
            $container = new container();
            $container ->setContainerReference($_POST['reference']);
            $container ->setContainerStatusId($_POST['state_id']);
            $container ->setContainerShelveId($_POST['shelve_id']);
            $container ->setContainerPropertyId($_POST['property_id']);
            
            if($container->saveContainer()){
                $container ->setContainerByReference($_POST['reference']);
                header('Location: index.php?q=deposit&categ=container&sub=view&id='. $container->getContainerId());
            }else{
                echo "Echec enregistrement...<br>";
            }
        } else{ echo "Données non reçues....<br>";
        }
}
?>
