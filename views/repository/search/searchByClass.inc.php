<?php
require_once 'models/repository/recordsManager.class.php';
require_once 'models/repository/record.class.php';
require_once 'views/repository/records/display.inc.php';
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';

echo "Explorez aussi les sous classes ";

echo "<ol>";
$class = new activityClassesManager();
$classesChild = $class -> classesChildById($_GET['id']);
foreach ($classesChild as $id) {
    displayClass($id['id']);
}
echo "<ol/>";

    function displayClass($id){
        $class = new activityClass();
        $class -> setClassById($id);
        echo "<a href=\"index.php?q=repository&categ=search&sub=class&id=". $class ->getClassId()."\" >";
        echo $class ->getClassTitle() ." (". $class ->getClassCode().")";
        echo "</a>";
    }


echo "<hr>";

$recordsList = new recordsManager();
$recordsList = $recordsList -> recordsIdsByClassId($_GET['id']);
foreach($recordsList as $id){
    $record = new record();
    $record -> setRecordId($id['id']);
    $record -> getRecordById();
    displayRecordLight($record);
}
?>