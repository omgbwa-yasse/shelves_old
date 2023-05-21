
<h1>Toutes les salles</h1>
<a href="index.php?q=deposit&categ=room&sub=add">Ajouter une salle</a>
<table border="2" width="700px">
<tr>
    <th>Référence </th>
    <th>Nom de la salle</th>
</tr>
<?php
    require_once 'models/deposit/roomManager.class.php';
    $rooms = new roomManager();
    $rooms = $rooms ->allRoom();
    foreach($rooms as $room){
    echo "<tr><td><a href=\"index.php?q=deposit&categ=room&sub=view&id=" . $room['id'];
    echo "\">" . $room['reference'];
    echo "</a><td>" . $room['title'];
    echo "</tr>";
    }
?>
</table>