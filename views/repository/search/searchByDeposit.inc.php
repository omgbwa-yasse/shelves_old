<?php
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/record.class.php';
include_once 'models/repository/recordsManager.class.php';
require_once 'views/repository/records/display.inc.php';
require_once 'models/deposit/roomManager.class.php';
require_once 'models/deposit/room.class.php';

if(empty($_GET['id'])){
?>
    <h1>Toutes les salles</h1>
    <table class="table-view">
    <tr>
        <th>Référence </th>
        <th>Nom de la salle</th>
    </tr>
    <?php
        require_once 'models/deposit/roomManager.class.php';
        $rooms = new roomManager();
        $rooms = $rooms ->allRoom();
        foreach($rooms as $room){
        echo "<tr><td>" . $room['reference'];
        echo "<td><a href=\"index.php?q=repository&categ=search&sub=deposit&id=" . $room['id'];
        echo  "\">".$room['title'];
        echo "</a></tr>";
        }
    ?>
    </table>

<?php
}
else{
    $room = new room();
    $room -> setRoomById($_GET['id']);

    echo "<h1> Liste des document de : ". $room -> getRoomTitle() ."</h1>";
    
    $list = new recordsManager();
    $list = $list-> recordsByDepositId($_GET['id']);
    foreach($list as $recordId){
        $record = new record();
        $record -> setRecordId($recordId['id']);
        $record -> getRecordById();
        displayRecordLight($record);
    }

}
?>
