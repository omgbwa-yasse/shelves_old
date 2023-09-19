<?php
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/record.class.php';
include_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/records/display.inc.php';
require_once 'models/deposit/containerManager.class.php';
require_once 'models/deposit/container.class.php';
require_once 'models/deposit/room.class.php';

if(isset($_GET['roomId'])){
    $list = new shelveManager();
    $list = $list ->allSlevesInRoom($_GET['roomId']);
    foreach($list as $id){
        $shelve = new shelve();
        $shelve ->setShelveById($id['id']);
        echo "<a href=\"index.php?q=repository&categ=search&sub=deposit&shelveId=". $shelve->getShelveId() ."\"> Salle n°" . $shelve->getShelveReference() ."<a/>"; 
    }

}elseif(isset($_GET['shelveId'])){
    $list = new containerManager();
    $list = $list ->allContainerInShelveId($_GET['shelveId']);
    foreach ($list as $id) {
        $container = new container();
        $container->setContainerById($id['id']);
        echo "<a href=\"index.php?q=repository&categ=search&sub=deposit&containerId=". $container->getContainerId() 
        ."\"> Boite n°" . $container ->getContainerReference() ."<a/>"; 
    }
} elseif(isset($_GET['containerId'])){
    $list = new recordsManager();
    $list = $list ->recordsInContainer($_GET['containerId']);
    foreach($list as $id){
        $record = new record();
        $record ->hydrateRecordById($id['id']);
        displayRecordDefault($record);
    }
}else{

    echo "<h1>Toutes les salles</h1><table class=\"table-view\"><tr>
    <th>Référence </th>
    <th>Nom de la salle</th></tr>";

    require_once 'models/deposit/roomManager.class.php';
    $rooms = new roomManager();
    $rooms = $rooms ->allRoom();
    foreach($rooms as $room){
    echo "<tr><td>" . $room['reference'];
    echo "<td><a href=\"index.php?q=repository&categ=search&sub=deposit&roomId=". $room['id'];
    echo  "\">".$room['title'];
    echo "</a></tr>";
    }
    echo "</table>";

}

?>
