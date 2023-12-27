<?php
require_once 'models/setting/customerRole.class.php';

$userRole = new customerRole();

if(isset($_POST['repository'])){
    $userRole -> setRepositoryRole($_POST['repository']);
}else{
    $userRole -> setRepositoryRole(FALSE);
}


if(isset($_POST['communication'])){
    $userRole -> setCommunicationRole($_POST['communication']);
}else{
    $userRole -> setCommunicationRole(FALSE);
}


if(isset($_POST['transfer'])){
    $userRole -> setTransferRole($_POST['transfer']);
}else{
    $userRole -> setTransferRole(FALSE);
}


if(isset($_POST['audit'])){
    $userRole -> setAuditRole($_POST['audit']);
}else{
    $userRole -> setAuditRole(FALSE);
}


if(isset($_POST['dolly'])){
    $userRole -> setDollyRole($_POST['dolly']);
}else{
    $userRole -> setDollyRole(FALSE);
}


if(isset($_POST['deposit'])){
    $userRole -> setDepositRole($_POST['deposit']);
}else{
    $userRole -> setDepositRole(FALSE);
}


if(isset($_POST['tools'])){
    $userRole -> setToolsRole($_POST['tools']);
}else{
    $userRole -> setToolsRole(FALSE);
}


if(isset($_POST['setting'])){
    $userRole -> setSettingRole($_POST['setting']);
}else{
    $userRole -> setSettingRole(FALSE);
}


if(isset($_GET['id'])){
    $userRole -> setUserId($_GET['id']);
}else{
    $userRole -> setUserId(FALSE);
}


if($userRole -> saveRole()){
    echo "Les droits ont été enregistrés...";
}else{
    echo "Erreur d'enregistrement, veuillez contacter l'administrateur..";
}





?>