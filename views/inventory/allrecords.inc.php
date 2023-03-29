<?php
include "models/connexion.class.php";
include "models/search/allRecords.class.php";

$cnx = new PDO("mysql:host=localhost;dbname=dbms", "root", "");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT records.id_records as id, 
        records.records_title as title, 
        records.records_date_start as date_start, 
        records.records_date_end as date_end,
        records.records_observation as observation,
        classification.classification_code as cote,
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
        ";

$allRecords = $cnx -> prepare($sql);

$allRecords->execute();

// var_dump($allRecords);

echo "<div style=\"align:center; margin-left:200px;\">";

foreach($allRecords as $elements){
    echo "<br><br><br>";
    echo $elements['id'];
    echo $elements['title'];
    echo $elements['date_start'];
    echo $elements['date_end'];
    echo $elements['observation'];
    echo $elements['cote'];
    echo $elements['support'];
    echo $elements['statut'];
    echo $elements['boite'];
}
?>
</div>
