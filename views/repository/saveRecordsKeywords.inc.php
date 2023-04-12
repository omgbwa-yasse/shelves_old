<?php
require 'models/repository/keywords.class.php';

echo "<br> enregistrement effectuée et début de la procédure de sauvergarde des mots clés ... <br><br><br>";

// Recupération de l'ID sur la base NUI
    $idRecords = "SELECT records.id_records FROM records WHERE records_nui = '".$_POST['nui']."' " ;
    $idRecords =$cnx->prepare($idRecords);
    $idRecords->execute();
    $id_records = NULL ;
    foreach($idRecords as $id) {
            echo "l'ID de l'enregistrement est " . $id_records;
            $id_records =  $id['id_records'];
            }
    
    // Boucle de découpage, controle, lie ou insertion d'un mot-clé
    $text = htmlspecialchars($_POST['keywords']);
    $lenText = strlen($text);
    $text = explode(';', $text, $lenText);
    var_dump($text);
    echo "<br/>";
    $text = array_filter($text);
    var_dump($text);
    foreach($text as $tab){
        $Keyword = new keywords();
        $Keyword -> setKeyword($tab);
        $Keyword -> setRecordId($id_records);
        if($Keyword->KeywordVerification() == TRUE){
            $Keyword ->linkKeywordRecord(); 
        } else {
            $Keyword ->saveNewKeyword($tab);
            $Keyword ->linkKeywordRecord();
        } 
    }
?>