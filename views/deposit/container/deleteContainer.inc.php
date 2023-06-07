<h1>Rapport de suppression du contenant</h1>
<?php
include_once 'models/deposit/container.class.php';

$container = new container();
$container -> setContainerById($_GET['id']);
if($container -> deleteContainer()){
    header('Location: index.php?q=deposit&categ=container&sub=all');
}else{
    echo "Le contenant que vous voulez supprimer contient : ";
    $number = $container ->containerUsedNumber();
    foreach($number as $value){
        echo $value;
    }
    echo " enregistrements. <br> Effacer ou déplacer d'abord les enregistrements .";
}
    

?>