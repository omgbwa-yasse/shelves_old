<?php 
require_once 'models/setting/customer.class.php';
require_once 'models/setting/customerAddress.class.php';


$customer = new customer(); 
$customer->createCustomerSand(); 


if($_POST['password1'] == $_POST['password2']){ 
    $customer->setPasswordByCrypt($_POST['password1']); 
}

// enregistrer un usager
    $customer->setCustomerPseudo($_POST['pseudo']); 
    $customer->setCustomerName($_POST['name']); 
    $customer->setCustomerSurname($_POST['surname']); 
    $customer->setCustomerBirthday($_POST['birthday']);
    $customer->setCustomerBirthday($_POST['gender']);
    $customer->saveCustomer();
    echo $customer->getCustomerPseudo();
    $id = $customer->getCustomerPseudo();
    $customer->hydrateByPseudo($id);

// enregistrer les contacts
    $address = new CustomerAddress(); 
    $address->setCustomerAddressLocation($_POST['location']);  
    $address->setCustomerAddressPhone1($_POST['phone1']);
    $address->setCustomerAddressPhone2($_POST['phone2']);
    $address->setCustomerAddressEmail1($_POST['email1']);
    $address->setCustomerAddressEmail2($_POST['email2']);
    $address->setCustomerId($customer->getCustomerId());
    $address->createCustomerAddress();

// Redirection
   // header('Location: index.php?q=setting&categ=customerRole&sub=add&id='.$address->getCustomerId()); 
?>