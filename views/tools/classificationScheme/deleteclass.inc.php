

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
    echo "<b>id : </b> ".$class->getClassId() ."    <br> ";
    echo "<b>code : </b> ".$class->getClassCode() ."   <br>   ";
    echo "<b>title :  </b>  ".$class->getClassTitle() ."  <br>    ";
    echo "<b>observation</b> ".$class ->getClassObservation();
    echo  $class ->numberChildUsed()." sous-classes"."  ";
    $classmanager  ->deleteClassificationBycode($class->getClassCode());
}


echo "<hr/>";



?>
<a href="index.php?q=tools&categ=classificationScheme&sub=mainClasses">Classes principales</a><br/>