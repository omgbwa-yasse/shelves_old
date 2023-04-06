<?php

include "models/connexion.class.php";
include "models/search/allRecords.class.php";
$cnx = new PDO("mysql:host=localhost;dbname=dbms", "root", "");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Afficher par ID...classe à rechercher </br>" ;
echo $_POST['code_title'];

// Afficher les ID
$idclasse;
$id = "SELECT classification.classification_id as id FROM classification 
WHERE classification.classification_code_title = '".$_POST['code_title']."'";
$id = $cnx->prepare($id);
$id ->execute();
foreach($id as $id_Classe){
    $idclasse = $id_Classe['id'];
}
echo "<br/> id de la classe est :". $idclasse;
$sql = "SELECT records.id_records as id, 
        records.records_title as title, 
        records.records_nui as nui, 
        records.records_date_start as date_start, 
        records.records_date_end as date_end,
        records.records_observation as observation,
        records.classification_id as classification_id
        FROM records
        WHERE classification_id = 3 ";

$allRecords = $cnx -> prepare($sql);


$allRecords->execute();

// var_dump($allRecords);
?>

<div style="align:left; margin-left:200px;margin-top:80px;">
<?php
foreach($allRecords as $elements){
    $elements['id'];
    $elements['nui'];
    $elements['title'];
    $elements['date_start'];
    $elements['date_end'];
    $elements['observation'];
    $dateEnd = Null ;
    if($elements['date_end'] == '0000-00-00'){
            $dateEnd = ''; }
    else {
        $dateEnd = ' au '. $elements['date_end'];   
        }
echo'<table border="0" width="1000px">
    <tr><td><h3><b>'. $elements['title'].'</b></h3></tr>
    <tr><td> Nui : '. $elements['nui'].' </tr>
    <tr><td> '. $elements['date_start'].' ' .$dateEnd.'</tr>
    <tr><td> '. $elements['observation'].' </tr>
    <tr><td>Ref<b>:'. $elements['id']. '</b> </b></tr><td>
    ';

    $keywords = "SELECT records_keywords.keyword_id FROM records_keywords WHERE records_keywords.records_id = '". $elements['id'] ."' ";
    $keywords = $cnx -> prepare($keywords);
    
    if($keywords->execute()){
        foreach($keywords as $kwId){
            $listwords = "SELECT keyword FROM keywords WHERE keyword_id = '". $kwId['keyword_id']."' ";
            $listwords = $cnx -> prepare($listwords);
            $listwords -> execute() ;
            foreach ($listwords as $words) {
                echo "  <b>". $words['keyword'] ."</b>"; 
                $keyArray = array_search($words['keyword'], $words);
                if( $keyArray == "0"){echo "";} else {echo ";" ;} ; } 
                } 
        } else { echo "Pas de mots clés"; } 
    
    }
    echo "</td><tr></table><br/><br/>";

?>