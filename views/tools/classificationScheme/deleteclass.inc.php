

<?php
require_once 'models/tools/classification/class.class.php';
require_once 'models/tools/classification/classesManager.class.php';
$class = new activityClass();
$class ->setClassById($_GET['id']);
$classmanager = new activityClassesManager();
if ($class->numberChildUsed() > 0) {
    echo '<h1>Vous ne pouvez pas supprimer cette classe qui contient ' . $class->numberChildUsed() . ' sous classe</h1>';
}

else{
    echo '<h1>Vous avez supprimer cette classe avec success :</h1>';
    echo $class->getClassId() . "  ";
    echo $class->getClassCode() . "  ";
    echo $class->getClassTitle() . "  ";
    echo $class ->getClassObservation();
    echo $class ->numberChildUsed()." sous-classes". "  ";
    $$classmanager  ->deleteClassificationById($_GET['id']);
}


echo "<hr/>";



?>
<a href="index.php?q=tools&categ=classificationScheme&sub=mainClasses">Classes principales</a><br/>