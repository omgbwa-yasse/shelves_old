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
    while($pos = stripos($text, ";")){
            $motCle = substr($text, 0, $pos);    
            $Keyword = new keywords();
            $Keyword -> setKeyword($motCle);
            $Keyword -> setRecordId($id_records);

    // verifie si le mot existe j'enregistre dans la table de liaison, sinon je l'enregistre
           if($Keyword->KeywordVerification() == TRUE){
                $Keyword ->linkKeywordRecord();
           }else{
                $Keyword ->saveNewKeyword($motCle);
           }
           $text = substr($text,$pos+1);}
        
    // en sortant de la boucle on enregistre le dernier mot clés
    $Keyword -> setKeyword($text);
        If($Keyword->KeywordVerification() == TRUE){
            $Keyword ->linkKeywordRecord();
        } else {
            $Keyword ->saveNewKeyword($motCle);
        }
?>