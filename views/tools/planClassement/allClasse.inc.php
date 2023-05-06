<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<style>
    summary {
    padding: 10px;
    background-color: #eee;
    cursor: pointer;
}

summary:hover {
    background-color: #ccc;
}
</style>
<?php

require_once  'models/tools/classe.class.php';
    $allclassification = new classification() ;
    $allclassification -> getAllClassification();

?>