<h2>Pour plus de résultat 
    <b>
        <a href ="../shelves/index.php?q=repository&categ=search&sub=allrecords">Tous les enregistrements</a>
    </b>
</h2>


<?php
include "models/connexion.class.php";
include "models/search/allRecords.class.php";

$cnx = new PDO("mysql:host=localhost;dbname=dbms", "root", "");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT records.id_records as id, 
        records.records_title as title, 
        records.records_nui as nui, 
        records.records_date_start as date_start, 
        records.records_date_end as date_end,
        records.records_observation as observation,
        classification.classification_code_title as code_title,
        records_support.records_support_title as support,
        records_status.records_status_title as statut,
        container.container_reference as boite
        FROM records
        LEFT JOIN records_support 
        ON records_support.records_support_id = records.records_support_id
        LEFT JOIN classification 
        ON classification.classification_id = records.classification_id
        LEFT JOIN records_status 
        ON records_status.records_status_id = records.records_status_id
        LEFT JOIN container 
        ON container.container_id = records.container_id
        ORDER  BY id DESC
        LIMIT 5
        ";

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
    $elements['code_title'];
    $elements['support'];
    $elements['statut'];
    $elements['boite'];

$dateEnd = Null ;

if($elements['date_end'] == '0000-00-00'){
        $dateEnd = ''; }
else {
    $dateEnd = ' au '. $elements['date_end'];   
    }
echo'<table border="0" width="1000px">
    <tr><td><h3><b>'. $elements['title'].'</b></h3></tr>
    <tr><td> Nui : '. $elements['nui'].' Classe : <b> '.$elements['code_title'] .'</b> </tr>
    <tr><td> '. $elements['date_start'].' ' .$dateEnd.'</tr>
    <tr><td> '. $elements['observation'].' </tr>
    <tr><td>Ref<b>:'. $elements['id']. '</b> </b>Support : <b>'. $elements['support'].' </b> Statut : <b>'. $elements['statut'].' </b> Boite : <b>'. $elements['boite'].' </b></tr><td>
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
</div>