<?php
require_once "models/setting/customerOrganisation.class.php";

$customer = new customerOrganisation();
$customer->setCustomerId($_GET['customerId']);
$customer->setCustomerOrganizationId($_POST['organizationId']);
if($customer->save()) {
    echo 'Enregistrement effectuée';
}
?>

