<?php
require_once "models/setting/customerOrganization.class.php";

$customer = new customerOrganization();
$customer->setCustomerId($_GET['customerId']);
$customer->setCustomerOrganizationId($_POST['organizationId']);
if($customer->save()) {
    echo 'Enregistrement effectuée';
}
?>

