<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

$sql = "SELECT term_id, term_cote, term_title, term_reference, microthesaurus_id, term_broader_id, term_scope_note FROM thesaurus";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID du terme</th><th>Cote du terme</th><th>Titre du terme</th><th>Référence du terme</th><th>ID du micro-thésaurus</th><th>ID du terme plus large</th><th>Note d'application du terme</th></tr>";
    // Afficher les données de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["term_id"]."</td><td>".$row["term_cote"]."</td><td>".$row["term_title"]."</td><td>".$row["term_reference"]."</td><td>".$row["microthesaurus_id"]."</td><td>".$row["term_broader_id"]."</td><td>".$row["term_scope_note"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats";
}
$conn->close();
?>