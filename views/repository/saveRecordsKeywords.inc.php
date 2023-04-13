<?php
require 'models/repository/keywords.class.php';

echo "<br> enregistrement effectuée et début de la procédure de sauvergarde des mots clés ... <br><br><br>";

    $Keyword = new keywords();
// Recupération de l'ID sur la base NUI
    $Keyword -> setRecordNui($_POST['nui']);
    $Keyword -> setRecordIdByNui();
    
    // Boucle de découpage, controle, lie ou insertion d'un mot-clé
    $text = htmlspecialchars($_POST['keywords']);
    $lenText = strlen($text);
    $text = explode(';', $text, $lenText);
    var_dump($text);
    echo "<br/>";
    $text = array_filter($text);
    var_dump($text);
    foreach($text as $tab){
        $Keyword -> setKeyword($tab);
        if($Keyword->KeywordVerification() == TRUE){
            $Keyword ->linkKeywordRecord(); 
        } else {
            $Keyword ->saveNewKeyword($tab);
            $Keyword ->linkKeywordRecord();
        } 
    }
?>