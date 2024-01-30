
<?php 
  require_once "models/setting/customerOrganization.class.php";
  require_once "models/setting/customerOrganizationManager.class.php";
  require_once "models/tools/organization/organization.class.php";
?>

<h1>Supprimer les organizations</h1>

<?php
    $customerOrganization = new customerOrganization();
    $customerOrganization->hydrateById($_GET['id']);
    echo "<hr/>";
    echo $customerOrganization->getCustomerOrganizationId();
    echo $customerOrganization->getCustomerId();
?>



<form action="index.php" method="post">
    <ul>
    <?php
        $list = new customerOrganizationManager();
        $lis = $list->allOrganizationByCustomerId($customerOrganization->getCustomerId());
        foreach($list as $id){
          echo $id["organization_id"];
        }
    ?>
    </ul>

    <input type="submit" value="Supprimer">