<h1>Affichage de classe  <a href="index.php?q=tools&categ=classificationScheme&sub=mainClasses">Classes principales</a></h1>
<hr>
<?php
require_once 'models/tools/classification/class.class.php';
require_once 'models/tools/classification/classesManager.class.php';
$class = new activityClass();
$class ->setClassById($_GET['id']);
echo 'ID :'.$class->getClassId() . " <br> ";
echo 'Code :'.$class->getClassCode() . " <br>  ";
echo 'Titre :'.$class->getClassTitle() . " <br>  ";
echo 'Observation :'.$class ->getClassObservation();
echo "<hr/>";
echo "<h2>Liste des sous classe</h2>";
echo "<hr/>";
$classChild = new activityClassesManager();
$classes_id = $classChild->ClassesChildBycode($class ->getClassCode());
if(empty($classes_id)){
    echo "Aucune sous-classe disponible";
}else{
    echo "<table>";

    foreach($classes_id as $class_id){
    
        $class2 = new activityClass();
        $class2 ->setClassByCode($class_id['id']);
        echo "<tr>";
        echo "<td>".$class2 ->getClassCode(). " </td> ";
        echo "<td>".$class2 ->getClassTitle(). "  </td>  ";
        echo "<td>".$class2 ->getClassObservation(). "  </td> ";
        echo "<td>".$class2 ->numberChildUsed()." sous-classes". "  </td> ";
        echo "<td><a href=\"index.php?q=tools&categ=classificationScheme&sub=viewClass&id=".$class2 ->getClassCode()."\">Afficher</a></td> ";
        echo "<td><a href=\"index.php?q=tools&categ=classificationScheme&sub=deleteClass&id=".$class2 ->getClassCode()."\">Supprimmer</a></td> ";
        echo "<td><a href=\"index.php?q=tools&categ=classificationScheme&sub=modifyClass&id=".$class ->getClassCode()."\">Modifier</a></td> ";
        echo "</tr>";
    }
   
    echo "</table>";
}

