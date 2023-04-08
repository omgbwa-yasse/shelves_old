<?php
require 'models/repository/keywords.class.php';



$New = new keywords();
$New ->getKeywordId("cadrage");

echo "<hr/>";


$New1 = new keywords();
$New1 ->getKeywordId("bois");
echo "<hr/>";

$New1->setRecordsId(20);

$New1->getAllKeywords();


?>