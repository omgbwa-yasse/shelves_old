<?php
require_once 'models/tools/classification/class.class.php';
require_once 'models/tools/classification/classesManager.class.php';

    $allClasseCodeTitle = new activityClassesManager();
    $allClasses = $allClasseCodeTitle->AllClasses(); ?>

    <form method="POST" action="index.php?q=repository&categ=search&sub=byClasse">
        <select name="classification_id">
            <?php foreach($allClasses as $classe){
                echo "<option value=\"".$classe['classification_id']."\"> ".$classe['classification_code'] . " - ".$classe['classification_title']."</option>";} 
            ?>
        </select> <br/>
    <input type="submit" name="envoyer">
    <input type="reset" name="envoyer">
    </form>

