<?php


if($_GET['q'] == "session"){
if(isset($_POST['login']) != NULL && isset($_POST['password']) != NULL){
    include_once 'connexion.views.php';
} else {
    header('location:index.php'); 
}}
?>