<h1>Rapport de suppression : Salle</h1>
<?php
include_once 'models/deposit/containerProperty.class.php';

$containerProperty = new containerProperty();
$containerProperty -> setContainerPropertyById($_GET['id']);
if($containerProperty -> deleteContainerProperty()){
    header('Location: index.php?q=deposit&categ=containerProperty&sub=all');
} else{
    echo "la salle que vous voulez supprimer contient : ";
    $number = $containerProperty ->containerPropertyUsedNumber();
    foreach($number as $value){
        echo $value;
    }
    echo " épis. <br> Si les épis sont vides, effacez les d'abord.";
}
    

?>