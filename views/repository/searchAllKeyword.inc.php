<?php
require 'models/repository/keywords.class.php';



$New = new keyword();
$New ->getKeywordId();

echo "<hr/>";


$New1 = new keyword();
$New1 ->getKeywordId();
echo "<hr/>";

$New1->setRecordId(20);

$New1->getAllKeywords();


?>