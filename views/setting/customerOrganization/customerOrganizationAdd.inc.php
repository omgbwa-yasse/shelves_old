<h1>Ajouter une organisation</h1>
<?php
require_once "models/setting/customer.class.php";
require_once "models/tools/organization/organization.class.php";
require_once "models/tools/organization/organizationManager.class.php";

$customer = new customer();
$customer->hydrateById($_GET["id"]);

echo $customer->getCustomerName();
echo $customer->getCustomerSurname();
$list = new organizationManager();
$list = $list->getAllOrganization();
?>

<form method="POST" action="index.php?q=setting&categ=customerOrganization&sub=save&customerId=<?= $_GET["id"] ?>">
    <select name="organizationId">
    <?php
        foreach ($list as $element) {
            $organization = new organization();
            $organization->setOrganizationById($element['id']);
            echo "<option value=\"" . $organization->getOrganizationId() ."\">";
                echo $organization->getOrganizationCode() ;
                echo " - ";
                echo $organization->getOrganizationTitle() ;
            echo "</option>";
        }
    ?> 
    </select>
    <input type="submit" value="Enregistrer">
    <input type="reset" value="Annuler">
</form>





