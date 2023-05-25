<?php
require_once "models/deposit/shelve.class.php";
$_POST['table'] = $_POST['table']/100;

if(isset($_GET['id'])){
    // Je vérifie si il y'a Un ID (donnée existe), je modifie dans la base avec les données envoyés
    $shelveUpdate = new shelve();
    if($shelveUpdate -> updateShelve($_GET['id'],$_POST['reference'], 
    $_POST['observation'],$_POST['ear'],$_POST['colonne'],
    $_POST['table'],$_POST['room_id'])){
        header('Location: index.php?q=deposit&categ=shelve&sub=all'); }
}else{
    if(isset($_POST['reference']) && isset($_POST['colonne']) && isset($_POST['table']) && isset($_POST['room_id'])){
        $shelve = new shelve();
        $shelve ->setShelveReference($_POST['reference']);
        $shelve ->setShelveObservation($_POST['observation']);
        $shelve ->setShelveEar($_POST['ear']);
        $shelve ->setShelveColonne($_POST['colonne']);
        $shelve ->setShelveTable($_POST['table']);
        $shelve ->setShelveRoomId($_POST['room_id']);
        if($shelve->saveShelve()){
            $shelve ->setShelveByReference($_POST['reference']);
            header('Location: index.php?q=deposit&categ=shelve&sub=view&id='. $shelve->getShelveId());
        }else{
            echo "Echec enregistrement...<br>";
        }
    } else{
        echo "echec toutes les données obligatoires ne sont pas disponibles";
    }
}
?>
