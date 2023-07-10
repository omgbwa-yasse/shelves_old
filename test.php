<?php

// Remplacez ces valeurs par les informations de connexion à votre base de données
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'dbms';

// Connectez-vous à la base de données
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérez les données des tables `retention` et `retention_classification`
$sql = "SELECT * FROM retention JOIN retention_classification ON retention.retention_id = retention_classification.retention_id";
$result = $conn->query($sql);

// Parcourez les résultats pour créer la grille d'enquête
$enquete = [];
while ($row = $result->fetch_assoc()) {
    // Récupérez les données des colonnes qui vous intéressent
    $classification_id = $row['classification_id'];
    $retention_duration = $row['retention_duration'];
    // ...

    // Ajoutez les données à la grille d'enquête
    $enquete[] = [
        'classification_id' => $classification_id,
        'dua' => $retention_duration,
        // ...
    ];
}

// Élaborez votre charte d'archivage en utilisant les informations recueillies dans la grille d'enquête
$charte = [];
foreach ($enquete as $item) {
    // Utilisez les informations de la grille d'enquête pour déterminer les modalités de traitement des différents types de documents produits ou gérés par votre service
    $charte[] = [
        'classification_id' => $item['classification_id'],
        'dua' => $item['dua'],
        // ...
    ];
}

// Affichez votre charte d'archivage
var_dump($charte);

?>