
<h1>Classes principales du plan de classement</h1>
<a href="index.php?q=tools&categ=classificationScheme&sub=addClass">Ajouter une classe</a>
<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/classe.class.php';

$classes = new activityClassesManager();
$classes_id = $classes -> allMainClasses();
?>

<table border="2" width="800px">
    <tr>
        <th>Code</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Sous-classes</th>
        <th colspan =3>action</th>
    </tr>
<?php
foreach($classes_id as $class_id){
    $class = new activityClass();
    $class ->setClassById($class_id['id']);
    echo "<tr>";
    echo "<td>". $class ->getClassCode();
    echo "<td>".$class ->getClassTitle();
    echo "<td>".$class ->getClassObservation();
    echo "<td>".$class ->numberChildUsed()." sous-classes";
    echo "<td><a href=\"index.php?q=tools&categ=classificationScheme&sub=viewClass&id=".$class ->getClassId()."\">Afficher</a>";
    echo "<td><a href=\"index.php?q=tools&categ=classificationScheme&sub=deleteClass&id=".$class ->getClassId()."\">Supprimmer</a>";
    echo "<td><a href=\"index.php?q=tools&categ=classificationScheme&sub=modifyClass&id=".$class ->getClassId()."\">Modifier</a>";
    
    

}?>
</table>
