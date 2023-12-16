<h1>Recherche de transfert par numéro</h1>
<?php 
require_once "models/transfer/transferManager.class.php";
require_once "views/transfer/search/displayTransfer.inc.php";

$References  = new transferManager();
$References = $References->allTransferReference();

foreach($References as $reference){
    echo "<a href=\"index.php?q=transfer&categ=search&sub=transfer&id=";
    echo $reference['id'];
    echo "\">";
    echo $reference['reference'];
    echo "</a>"
?>  
<?php
}

?>