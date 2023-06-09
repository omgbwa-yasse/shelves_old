<?php
require_once 'models/tools/organization/organization.class.php';

$code = htmlspecialchars($_POST['code']);
$title = htmlspecialchars($_POST['title']) ;
$observation = htmlspecialchars($_POST['observation']);



$organization = new organization();
$organization -> setOrganizationCode($code);
$organization -> setOrganizationTitle($title);
$organization -> setOrganizationObservation($observation);
if(isset($_POST['parent_id'])){
    $parent_id = htmlspecialchars($_POST['parent_id']);
    echo $parent_id;
    $organization -> setOrganizationParentId($parent_id);
}


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