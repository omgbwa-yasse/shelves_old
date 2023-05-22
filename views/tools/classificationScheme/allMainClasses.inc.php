<h1>Classes principales du plan de classement</h1>
<a href="index.php?q=tools&categ=classificationScheme&sub=addClass">Ajouter une classe</a>
<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';

$classes = new activityClassesManager();
$classes_id = $classes -> allMainClasses();
?>

<table border="2" width="800px">
    <tr>
        <th>Code</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Sous-classes</th>
        <th>Afficher</th>
    </tr>
<?php
foreach($classes_id as $class_id){
    $class = new activityClasse();
    $class ->setClassById($class_id['id']);
    echo "<tr>";
    echo "<td>". $class ->getClassCode();
    echo "<td>".$class ->getClassTitle();
    echo "<td>".$class ->getClassObservation();
    echo "<td>".$class ->numberChildUsed()." sous-classes";
    echo "<td><a href=\"index.php?q=tools&categ=classificationScheme&sub=viewClass&id=".$class ->getClassId()."\">Afficher</a>";
    

}?>
</table>
