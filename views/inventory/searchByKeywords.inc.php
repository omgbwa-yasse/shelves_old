<?php

require 'models/inventory/keywords.class.php';

$recordsByKeywords = new keywords();
$recordsByKeywords -> getAllKeywordRecords($_GET['id']);
echo "Recherche par mot clé";


?>