<?php
echo "<br> enregistrement effectuée et début de la procédure de sauvergarde des mots clés ... <br><br><br>";

    // Recupération de l'ID sur la base NUI
    $idRecords = "SELECT records.id_records FROM records WHERE records_nui = '".$_POST['nui']."' " ;
    $idRecords =$cnx->prepare($idRecords);
    $idRecords->execute();
    foreach($idRecords as $id){
        echo "l'ID de l'enregistrement est " . $id['id_records'];
    }
    
    // Insertion des mots 
    $text =$_POST['keywords'];   
    while($pos = stripos($text, ";")){
    echo "</br> Début de la boucle tant que ...";
        $motCle = substr($text, 0, $pos);

    // Je traite les données
        $savekeyword = "INSERT INTO keywords (keyword_id,keyword) VALUES ( NULL,'". $motCle."')";
        $savekeyword = $cnx->prepare($savekeyword);
        if($savekeyword -> execute()){
            echo "</br> mot clé enregistrés est ". $motCle ;
        };
        
    // xxxxxxxxxxxxxxxx
        $keywordID = "SELECT keyword_id FROM keywords WHERE keywords.keyword = '".$motCle."' " ;
        $keywordID = $cnx -> prepare($keywordID);
        $keywordID ->execute();
        
    // Parcourir les résulatats
        $keyID = NULL;
        foreach($keywordID as $key){
        $keyID = $key['keyword_id'] ; }
        if($keyID){ echo "<br> Id du clé enregistré est : " .$keyID; }

    // Je sauvergarde les données
        $savekeyword = "INSERT INTO records_keywords (keyword_id,records_id) VALUES ('". $keyID."','". $id['id_records']."')";
        $savekeyword = $cnx->prepare($savekeyword);
        if($savekeyword->execute()){
            echo "<br> mot clé et records liés dans records_keywords";
        };
        $text = substr($text,$pos+1);
    }

// Enregistrement du dernier mot-clé
echo "</br> <hr> fin de la bouble et enregistrement du dernier mot :" .$text;
    $saveLastkeyword = "INSERT INTO keywords (keyword) VALUES ('". $text."')";
    $saveLastkeyword = $cnx ->prepare($saveLastkeyword);
    $saveLastkeyword->execute();

// Recupère l'ID du dernier mot clé
    $LastKeywordId = "SELECT keyword_id FROM keywords WHERE keywords.keyword = '".$text."' " ;
    $LastKeywordId = $cnx -> prepare($LastKeywordId);
    $LastKeywordId ->execute();
    foreach($LastKeywordId as $key){
            $lastkeyId = $key['keyword_id'] ; 
            if($lastkeyId){ echo "<br> Id du dernier mot clé enregistré est : " .$lastkeyId; }

            // Association dans la table records_keywords
            $savekeyword = "INSERT INTO records_keywords (keyword_id,records_id) VALUES ('". $lastkeyId."','". $id['id_records']."')";
            $savekeyword = $cnx->prepare($savekeyword);
            if($savekeyword->execute()){
                echo "<br> dernier mot clé lié au records  dans records_keywords";
            }
        }
    ;

?>