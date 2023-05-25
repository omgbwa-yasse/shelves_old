<h1>Rapport de suppression : étagiaire</h1>
<?php
include_once 'models/deposit/shelve.class.php';

$shelve = new shelve();
$shelve -> setShelveById($_GET['id']);
if($shelve -> deleteShelve()){
    header('Location: index.php?q=deposit&categ=shelve&sub=all');
} else{
    echo "la salle que vous voulez supprimer contient : ";
    $number = $shelve ->shelveUsedNumber();
    foreach($number as $value){
       echo $value;
        
    }
    echo " étagière(s). <br> Si les étagiaires sont vides, effacez les d'abord.";
}
    

?>