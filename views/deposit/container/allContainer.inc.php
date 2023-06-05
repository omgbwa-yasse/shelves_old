<?php
require_once 'models/deposit/container.class.php';
require_once 'models/setting/containerStatus.class.php';
require_once 'models/deposit/containerManager.class.php';
require_once 'models/deposit/containerProperty.class.php';
require_once 'models/deposit/shelve.class.php';

$containers = new containerManager();
$property = new containerProperty();
$status = new containerStatus();


?>

<h1>Toutes les contenants </h1>
<a href="index.php?q=deposit&categ=container&sub=add">Ajouter un contenant</a>
<table class="table-view">
<tr>
    <th>Référence du contenant</th>
    <th>Proprieté</th>
    <th>Etat</th>
    <th>Etagière</th>
</tr>
<?php

    $containers = $containers  ->allContainer();
    foreach($containers as $id){
            $container = new container();    
            $container -> setContainerById($id['container_id']);
            echo "<tr><td><a href=\"index.php?q=deposit&categ=container&sub=view&id=".$id['container_id']."\">". 
                $id['container_reference'];
            echo "</a>";
            $property -> setContainerPropertyById($container->getContainerPropertyId());
            echo "<td>". $property ->getContainerPropertyTitle();
            $status -> setContainerStatusById($container->getContainerStatusId());
            echo "<td>". $status ->getContainerStatusTitle();
            $shelve = new shelve();
            $shelve -> setShelveById($container ->getShelveId());
            echo "<td>". $shelve ->getShelveReference();
            echo "</tr>";
    }
?>
</table>