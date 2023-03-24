<?php 

ob_start(); ?>
<h1>liste des Records</h1>





<?php 
$titre = "les livres de la bibliothèque";
$content = ob_get_clean();
require "template/template.php";
?>