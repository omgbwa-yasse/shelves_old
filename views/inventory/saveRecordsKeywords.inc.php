<?php
echo "<br> enregistrement effectuée et début de la procédure de sauvergarde des mots clés ...";

    // Recupération de l'ID sur la base NUI
    $idRecords = "SELECT id_records WHERE records_nui == ".$_POST['nui'] ;
    $idRecords =$cnx->prepare($idRecords);
    $idRecords->execute();
    foreach($idRecords as $id){
        echo "l'ID de l'enregistrement est " . $id['id_records'];
    }
    
    // Insertion des mots 
    $text =$_POST['keywords'];   
    while($pos = stripos($text, ";")){
        $motCle = substr($text, 0, $pos);

    // Je traite les données
        $savekeyword = "INSERT INTO keywords (keyword_id,keyword,keyword_parent_id) VALUES ( NULL,'". $motCle."',NULL)";
        $savekeyword = $cnx->prepare($savekeyword);
        $savekeyword -> execute();
        
    // xxxxxxxxxxxxxxxx
        $keywordID = "SELECT keyword_id FROM keyword WHERE keyword = ".$motCle."";
        $keywordID = $cnx -> prepare($keywordID);
        $keywordID ->execute();

    // Parcourir les résulatats
        $keyID = NULL;
        foreach($keywordID as $key){
        $keyID = $key['eyword_id'] ; }

    // Je sauvergarde les données
        $savekeyword = "INSERT INTO keywords_records (keyword_id,id_records) VALUES ('". $motCle."' ,'". $motCle."')";
        $text = substr($text,$pos+1);}
        $savekeyword = "INSERT INTO keywords (keyword_id,keyword,keyword_parent_id) VALUES ( NULL,'". $text."',NULL)";




?>