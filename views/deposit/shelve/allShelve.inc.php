
<h1>Toutes les épis</h1>
<div class="nav-botton">
    <div><a href="index.php?q=deposit&categ=shelve&sub=add">Ajouter une étagière</a></div>
</div>
<table class="table-view">
<tr>
    <th>Référence </th>
    <th>Face</th>
    <th>Travée</th>
    <th>Tablette</th>
    <th>Surface</th>
    <th>Salle</th>
    <th>Description</th>
</tr>
<?php
    require_once 'models/deposit/shelveManager.class.php';
    require_once 'models/deposit/room.class.php';
    $shelves = new shelveManager();
    $shelves = $shelves ->allShelve();
    $room = new room();
    $volumetrie = NULL;
    foreach($shelves as $shelve){
    echo "<tr><td><a href=\"index.php?q=deposit&categ=shelve&sub=view&id=" . $shelve['shelve_id'];
    echo "\">" . $shelve['shelve_reference'];
    echo "<td>" . $shelve['shelve_ear'];
    echo "<td>" . $shelve['shelve_colonne'];
    echo "<td>" . $shelve['shelve_table'] . " m";
    echo "<td>" . $shelve['shelve_table'] * $shelve['shelve_colonne'] * $shelve['shelve_ear'] . " ml" ;
    $room -> setRoomById($shelve['room_id']);
    echo "<td><a href=\"index.php?q=deposit&categ=room&sub=view&id=".$room->getRoomId()."\">(".
    $room->getRoomReference() .") ". $room->getRoomTitle();
    echo "</a><td>" . $shelve['shelve_observation'];
    echo "</tr>";
    $volumetrie += $shelve['shelve_table'] * $shelve['shelve_colonne'] * $shelve['shelve_ear'];

    }
?>
</table>
<?php
    echo "<br>Volumétrie total des surfaces de stockage :<b>" . $volumetrie . " ml </b> ";
?>