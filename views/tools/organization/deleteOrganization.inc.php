<?php
require_once 'models/tools/organization/organization.class.php';
echo "<a href=\"index.php?q=outilsGestion&categ=organization&sub=allOrganization\">Voir Tout l'organigramme</a><br>";

$organization = new organization();
echo "L'unite à supprimer est :" . $_GET['id'];
$message = $organization -> deleteOrganization ($_GET['id']);
echo $message;
?>