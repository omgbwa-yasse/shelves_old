<h1>Affichage de classe</h1>
<a href="index.php?q=tools&categ=classificationScheme&sub=mainClasses">Classes principales</a><br/>
<?php
require_once 'models/tools/classification/class.class.php';
require_once 'models/tools/classification/classesManager.class.php';
$class = new activityClasse();
$class ->setClassById($_GET['id']);
echo $class ->getClassId();
echo $class ->getClassCode();
echo $class ->getClassTitle();
echo $class ->getClassObservation();
echo "<hr/>";

$classChild = new activityClassesManager();
$classes_id = $classChild->ClassesChildById($class ->getClassId());
if(empty($classes_id)){
    echo "Aucune sous-classe disponible";
}else{
    foreach($classes_id as $class_id){
        $class = new activityClasse();
        $class ->setClassById($class_id['id']);
        echo "<tr>";
        echo "<td>". $class ->getClassCode();
        echo "<td>".$class ->getClassTitle();
        echo "<td>".$class ->getClassObservation();
        echo "<td>".$class ->numberChildUsed()." sous-classes";
        echo "<td><a href=\"index.php?q=tools&categ=classificationScheme&sub=viewClass&id=".$class ->getClassId()."\">Afficher</a>";
        
    }
}

