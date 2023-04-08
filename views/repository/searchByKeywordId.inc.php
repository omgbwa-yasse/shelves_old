<?php
echo $_GET['id'];
require 'models/repository/keywords.class.php';

echo "Recherche par mot clé";

$recordsByKeywords = new keywords();

$recordsByKeywords->setKeywordId($_GET['id']);


echo "l'ID de la classe est : ". $recordsByKeywords->getClassKeywordId();

$recordsByKeywords -> getAllRecordsByKeywordID();


?>