<h1>Rapport de suppression : Format de contenant</h1>
<?php
include_once 'models/deposit/containerProperty.class.php';

$containerProperty = new containerProperty();
$containerProperty -> setContainerPropertyById($_GET['id']);
echo var_dump($containerProperty ->containerPropertyUsed($_GET['id']));
echo "<br/>";
if($containerProperty -> deleteContainerProperty()){ 
    header('Location: index.php?q=deposit&categ=containerProperty&sub=all');
 }else{
     echo "Ce format contient : ";
     $number = $containerProperty ->containerPropertyUsedNumber();
     foreach($number as $value){
         echo $value['occurence'];
     }
    echo " contenants. <br> si les contenants ne sont pas vides.";
 }
    

?>