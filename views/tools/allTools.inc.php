<?php
require_once 'models/tools/classification/classe.class.php';
$classification = new activityClassesManager();

// récupération des données envoyées par la requête AJAX
$data = json_decode(file_get_contents('php://input'), true);

// vérification si l'ID de la classification est défini
if (isset($data['id'])) {
    // récupération de l'ID de la classification
    $id = $data['id'];

    // vérification si les données de la classification sont définies
    if (isset($data['data'])) {
        // mise à jour de la classification
        $classification->updateClassification($id, $data['data']);
    } else {
        // suppression de la classification
        $classification->deleteClassification($id);
    }
}
?>