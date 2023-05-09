<?php
require 'models/tools/classification/classe.class.php';
    $allClasseCodeTitle = new activityClassesManager();
    $allClasses = $allClasseCodeTitle->getAllClasses(); ?>

    <form method="POST" action="index.php?q=repository&categ=search&sub=byClasse">
        <select name="code_title">
            <?php
            foreach($allClasses as $classe){
            echo "<option  value=\"".$classe['title']."\"> ".$classe['code'] . "-".$classe['title']."</option>";} 
            ?>
        </select> <br/>
    <input type="submit" name="envoyer">
    <input type="reset" name="envoyer">
    </form>

