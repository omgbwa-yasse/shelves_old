

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
     <style>/* Style pour la liste imbriquée */
ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

li {
    margin-left: 20px;
}

/* Style pour les lignes de l'arbre */
li:before {
    content: "";
    position: absolute;
    border-top: 1px solid #000;
    width: 20px;
    height: 20px;
    top: 10px;
    left: -30px;
}

li:first-child:before {
    border-left: 1px solid #000;
}

li:last-child:before {
    border-left: 1px solid #000;
    height: 10px;
}

/* Style pour les éléments de l'arbre */
li > ul {
    position: relative;
}

li > ul:before {
    content: "";
    position: absolute;
    border-left: 1px solid #000;
    height: calc(100% - 20px);
    top: 20px;
    left: -30px;
}</style>

<?php
// Récupération des données de la base de données
// Remplacez les valeurs d'hôte, d'utilisateur, de mot de passe et de nom de base de données par les vôtres
$mysqli = new mysqli('localhost', 'root', '', 'dbms');
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$sql = 'SELECT * FROM classification';
$result = $mysqli->query($sql);
$classifications = [];
while ($row = $result->fetch_assoc()) {
    $classifications[$row['classification_id']] = $row;
}
$mysqli->close();

// Fonction récursive pour afficher les classifications sous forme de liste imbriquée
function displayClassification($classifications, $parent_id = 0, $level = 0) {
    $has_children = false;
    foreach ($classifications as $classification) {
        if ($classification['classification_parent_id'] == $parent_id) {
            if (!$has_children) {
                echo str_repeat('  ', $level) . "<ul>\n";
                $has_children = true;
            }
            echo str_repeat('  ', $level + 1) . '<li>' . htmlspecialchars($classification['classification_title']) . "</li>\n";
            displayClassification($classifications, $classification['classification_id'], $level + 2);
        }
    }
    if ($has_children) {
        echo str_repeat('  ', $level) . "</ul>\n";
    }
}

// Affichage des classifications sous forme de liste imbriquée
displayClassification($classifications);
?>
   
    
<script src="models/tools/organization/script/MindFusion.Common.js" type="text/javascript"></script>
<script src="models/tools/organization/script/MindFusion.Diagramming.js" type="text/javascript"></script>
<script src="models/tools/organization/organigram.js" type="text/javascript"></script>
</body>
</html>
