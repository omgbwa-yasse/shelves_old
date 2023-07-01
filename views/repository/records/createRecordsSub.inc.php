<?php 
require_once 'models/repository/record.class.php';
$recordsP = new record();
$recordsP -> setRecordId($_GET['id']);
$recordsP -> getRecordById();
$recordsP -> setRecordLevelTitleByLevelId();

// Je vérifie si le niveau de descript peut recevoir une pièce.
$recordsP -> setRecordLevelChildByLevelId();
if($recordsP->getRecordLevelChild()){
    echo "<br> sous dossier de : <a href=\"index.php?q=repository&categ=create&sub=display&id=". $recordsP -> getRecordId()."\">";
    echo "(". $recordsP->controlNui().") ".$recordsP -> getRecordTitle(). "</a>";
    
    //Formulaire 
    echo "<form method=\"POST\" action=\"index.php?q=repository&categ=create&sub=newSave&id_parent=" . $recordsP -> getRecordId() . "\">";
    include 'views/repository/records/recordForm.inc.php';
    echo "</form>";
} else{
    echo "Vous ne pouvez rien ajouter dans ce niveau de description  (". $recordsP -> getRecordLevelTitle() .")";
}
?>
