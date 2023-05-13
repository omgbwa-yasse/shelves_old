<?php
require_once  '../../../../models/tools/classification/classe.class.php';

$classification = new activityClassesManager() ;

// vérification si l'ID de la classification est défini dans l'URL
if (isset($_GET['id'])) {
    // récupération de l'ID de la classification
    $id = $_GET['id'];

    // vérification si l'action est définie dans l'URL
    if (isset($_GET['f'])) {
        // récupération de l'action
        $action = $_GET['f'];

        if ($action === 'D') {
            // suppression de la classification
            $classification->deleteClassification($id);
        } elseif ($action === 'U') {
            // récupération des données du formulaire
            $data = [
                'classification_code' => $_POST['code'],
                'classification_title' => $_POST['title'],
                'classification_code_title' => $_POST['codeTitle'],
                'classification_parent_id' => $_POST['parentId'],
                'classification_type_id' => $_POST['typeId'],
                'classification_observation' => $_POST['observation']
            ];

            // mise à jour de la classification
            $classification->updateClassification($id, $data);
        }
    }
}
