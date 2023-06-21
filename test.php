<?php
// Connexion à la base de données
$db = new mysqli('localhost', 'root', '', 'dbms');

// Vérification de la connexion
if ($db->connect_error) {
    die("Erreur de connexion: " . $db->connect_error);
}

// Fonction récursive pour afficher les classifications et leurs enfants
function displayClassification($db, $parent_code = '0', $level = 0) {
    // Requête pour sélectionner les classifications avec le parent spécifié
    $query = "SELECT c1.* FROM classification c1 LEFT JOIN classification c2 ON c1.classification_parent_id = c2.classification_code WHERE c2.classification_code = '$parent_code' OR (c2.classification_code IS NULL AND c1.classification_parent_id = '0')";
    $result = $db->query($query);

    // Affichage des classifications
    while ($row = $result->fetch_assoc()) {
        // Indentation pour montrer la hiérarchie
        echo str_repeat(' ', $level * 4) . $row['classification_title'] . "<br>";

        // Appel récursif pour afficher les enfants
        displayClassification($db, $row['classification_code'], $level + 1);
    }
}

// Affichage des classifications principales et de leurs enfants
displayClassification($db);

// Fermeture de la connexion à la base de données
$db->close();
?>