<?php
require_once 'models/tools/organization/organization.class.php';
$organization = new organization();

$organization -> setOrganizationById($_GET['id']);
echo "<div style=\"border:3px solid red; width:600px;margin:30px 0px 0px 20px;padding:10px 10px 10px 10px\">";
echo " <table><tr><td style=\"text-align:right\"> id : <td>". $organization -> getOrganizationId();
echo " <tr><td style=\"text-align:right\"> code : <td>". $organization -> getOrganizationCode();
echo " <tr><td style=\"text-align:right\"> Titre : <td>". $organization -> getOrganizationTitle();
echo " <tr><td style=\"text-align:right\"> Observation : <td>". $organization -> getOrganizationObservation();
echo " <tr><td style=\"text-align:right\"> Parent : <td>". $organization -> getOrganizationParentId();
echo "</table>";
echo "<a href=\"index.php?q=outilsGestion&categ=organization&sub=deleteUnite&id=".$organization-> getOrganizationId(). "\">Supprimer</a> 
    <a href=\"index.php?q=outilsGestion&categ=organization&sub=updateUnite&id=".$organization-> getOrganizationId(). "\">Modifier</a>";
echo "</div>";

?>