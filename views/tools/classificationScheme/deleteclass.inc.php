

<?php
require_once 'models/tools/classification/class.class.php';
require_once 'models/tools/classification/classesManager.class.php';
$class = new activityClasse();
$class ->setClassById($_GET['id']);
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
}


echo "<hr/>";

$classChild = new activityClassesManager();

?>
<a href="index.php?q=tools&categ=classificationScheme&sub=mainClasses">Classes principales</a><br/>