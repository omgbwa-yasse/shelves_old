<?php
require_once 'models/tools/classification/class.class.php';
require_once 'models/tools/classification/classesManager.class.php';

    $classes = new activityClassesManager();
    $mainClasses = $classes -> allMainClasses();
    echo "<div style=\"margin:30px 0px 0px 30px;padding:20px 20px 20px 20px;;border:solid 2px red;width:900px\">";
    
    echo "<ol class=\"organization\">";
    foreach ($mainClasses as $id) {
        displayClass($id[0]);
    }
    echo "<ol/>";


        function displayClass($id){
            $class = new activityClass();
            $class -> setClassById($id);
            echo "<li><img  class=\"service\" src=\"template/images/moins.png\" width=\"20px\" height=\"20px\">";
            echo "<a href=\"index.php?q=repository&categ=search&sub=class&id=". $class ->getClassId()."\" >";
            echo $class ->getClassTitle() ." (". $class ->getClassCode().")";
            echo "</a>";
            if($class-> checkClassChildById($id)){
                searchClassChild($id);
            }
        }
        function searchClassChild($id){
            $classes = new activityClassesManager();
            $classes = $classes -> classesChildById($id);
            echo "<ol class=\"subService\">";
            foreach($classes as $id){
                echo "<li>". displayClass($id['id']);
            }
            echo "</ol>";
        }
        ?>