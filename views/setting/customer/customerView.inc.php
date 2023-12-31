<?php
    require_once 'models/setting/customerRole.class.php';
    require_once "models/setting/customer.class.php";
    require_once 'models/tools/organization/organization.class.php';
    require_once 'models/setting/customerOrganization.class.php';

    $customer = new customer();
    $customer->hydrateById($_GET['id']);
    $customerOrganization  = new customerOrganization();
    $customerOrganization->setCustomerId($_GET['id']);
    $customerOrganization->hydrate();
    $id = $customerOrganization->getCustomerId();
    $list = new customerManager();
    $list->allOrganizationByCustomerId($id);
?>

<h1>Fiche usager</h1>
<h2>Infomations</h2>
<table style="border: 1px solid red; margin-bottom:20px;">
<tr>
    <th> Nom </th><td><?= $customer->getCustomerPseudo() ?></td>
</tr>
<tr>
    <th> Prénom </th><td><?= $customer->getCustomerSurname() ?></td>
</tr>
<tr>
    <th> Année naissance</th><td><?= $customer->getCustomerBirthday() ?></td>
</tr>
<tr>
    <th> Genre</th><td><?= $customer->getCustomerGender() ?></td>
</tr>
</table>

<h2>Organisation</h2>
<?

foreach($list as $item) {
  echo $item["id"];
}

?>


<ol>
    <?php 
      $organization = new organization();
      $organization->setOrganizationById($id);
      echo "<li>";
        echo $organization->getOrganizationTitle();
        echo "(" . $organization->getOrganizationCode(). ")";
      echo "</li>";
    ?>
</ol>
<a href="index.php?q=setting&categ=customerOrganization&sub=add&id=<?=$customer->getCustomerId()?>">Ajouter une organisation</a>

<h2>Contact</h2>
<ol>
  <li>Téléphone 1 :</li>
  <li>Télephone 2 : </li>
  <li>Email 1 : </li>
  <li>Email 2 : </li>
  <li>Adresse :</li>
</ol>


<h2>Droits et habilitations</h2>
<ol>
  <li>Droit 1</li>
  <li>Droit 2</li>
  <li>Droit 3</li>
  <li>Droit 4</li>
  <li>Droit 5</li>
</ol>




<div style="display:inline;margin:0px 40px 0px 0px;">
    <a href="index.php?q=setting&categ=customer&sub=update&id=<?=$customer->getCustomerId()?>">Modifier</a>
    <a href="index.php?q=setting&categ=customer&sub=delete&id=<?=$customer->getCustomerId()?>">Supprimer</a>
    <a href="index.php?q=setting&categ=customerRole&sub=update&id=<?=$customer->getCustomerId()?>">Gerer les droits</a>
</div>