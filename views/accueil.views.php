<?php
ob_start(); ?>
<h1>Ma page d'accueil</h1>




<?php 
$titre = "Mon Repertoire";
$content = ob_get_clean();
require "template/template.php";
?>