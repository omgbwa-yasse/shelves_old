<?php  
    require_once 'models/repository/records.class.php';


    $recordsP = new records();
    $recordsP -> setRecordId($_GET['id']);
    $recordsP -> getRecordById();
    echo "<br> sous dossier de : <a href=\"index.php?q=repository&categ=create&sub=display&id=". $recordsP -> getRecordId()."\">";
    echo $recordsP->controlNui()." : ".$recordsP -> getRecordTitle(). "</a>";
    echo "<form method=\"POST\" action=\"index.php?q=repository&categ=create&sub=newSave&id_parent=" . $recordsP -> getRecordId() . "\">";

    
?>
</form>