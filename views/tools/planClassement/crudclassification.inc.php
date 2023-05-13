<?php
require_once  '../../../models/tools/classification/classesManager.class.php';

$classification = new activityClassesManager() ;


if (isset($_GET['id'])) {
  
    $id = $_GET['id'];

    if (isset($_GET['f'])) {
    
        $action = $_GET['f'];

        if ($action === 'D') {
      
            $classification->deleteClassification($id);
        } elseif ($action === 'U') {

            $data = [
                'classification_code' => $_POST['code'],
                'classification_title' => $_POST['title'],
                'classification_code_title' => $_POST['codeTitle'],
                'classification_parent_id' => $_POST['parentId'],
                'classification_type_id' => $_POST['typeId'],
                'classification_observation' => $_POST['observation']
            ];

            $classification->updateClassification($id, $data);
        }
    }
}
