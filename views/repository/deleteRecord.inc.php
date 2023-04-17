<?php
require_once 'models/repository/keyword.class.php';

echo "Ici j'efface tout simplement...."; 
$del = new keyword();
$del -> setRecordId($_GET['id']);
$del -> deleteKeyword();
$del -> deleteRecord($_GET['id']);

?>