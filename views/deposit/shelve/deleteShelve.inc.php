<h1>Rapport de suppression : épis</h1>
<?php
include_once 'models/deposit/shelve.class.php';

$shelve = new shelve();
$shelve -> setShelveById($_GET['id']);
if($shelve -> deleteShelve()){
    header('Location: index.php?q=deposit&categ=shelve&sub=all');
} else{
    echo "l'épis que vous voulez supprimer contient : ";
    $number = $shelve ->shelveUsedNumber();
    foreach($number as $value){
       echo $value;
        
    }
    echo " boites. <br> Si les boites sont vides, effacez les d'abord.";
}
    

?>