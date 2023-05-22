<h1>Rapport de suppression : Salle</h1>
<?php
include_once 'models/deposit/room.class.php';

$room = new room();
$room -> setRoomById($_GET['id']);
if($room -> deleteRoom()){
    header('Location: index.php?q=deposit&categ=room&sub=all');
} else{
    echo "la salle que vous voulez supprimer contient : ";
    $number = $room ->roomUsedNumber();
    foreach($number as $value){
        echo $value;
    }
    echo " étagière(s). <br> Si les étagiaires sont vides, effacez les d'abord.";
}
    

?>