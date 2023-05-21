<?php
require_once "models/deposit/room.class.php";

if(isset($_GET['id'])){
    // Je vérifie si il y'a Un ID (donnée existe), je modifie dans la base avec les données envoyés
    $roomUpdate = new room();
    if($roomUpdate -> updateRoom($_GET['id'],$_POST['reference'], $_POST['title'],$_POST['observation'])){
        header('Location: index.php?q=deposit&categ=room&sub=all');
    }
    
}else{
            if(isset($_POST['reference']) && isset($_POST['title'])){
            $room = new room();
            $room ->setRoomReference($_POST['reference']);
            $room ->setRoomTitle($_POST['title']);
            $room ->setRoomObservation($_POST['observation']);
            if($room->saveRoom()){
                $room ->setRoomByTitle($_POST['title']);
                header('Location: index.php?q=deposit&categ=room&sub=view&id='. $room->getRoomId());
            }else{
                echo "Echec enregistrement...<br>";
            }
        }
}
?>
