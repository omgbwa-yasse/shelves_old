<?php
require_once 'models/tools/organization/organization.class.php';

$code = $_POST['code'];
echo $code;
$title = $_POST['title'];
echo $title;
$observation = $_POST['observation'];
echo $observation;
$parent_id = $_POST['parent_id'];
echo $parent_id;

$organization = new organization();
$organization -> setOrganizationCode($code);
$organization -> setOrganizationTitle($$title);
$organization -> setOrganizationObservation($observation);
$organization -> setOrganizationObservation($parent_id);

echo "<hr/> dans l'objet :";
echo $organization->getOrganizationCode();
echo $organization->getOrganizationTitle();
$code = $organization->getOrganizationCode();
echo $organization->getOrganizationObservation();
echo $organization->getOrganizationParentId();
echo "<hr/>";
$verification = $organization -> saveOrganization();
echo $verification;
echo "Votre unité enregistrée est : ";
$organization -> setOrganizationByCode($code);
echo "<br> Code : ". $organization->getOrganizationCode();
echo "<br> Title : ". $organization->getOrganizationTitle();
echo "<br> Observation : ". $organization->getOrganizationObservation();
echo "<br> Code parent : ". $organization->getOrganizationParentId();

?>