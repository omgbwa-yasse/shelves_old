<?php
require 'models/tools/classe.class.php';

if(!empty($_POST['code_title']) == NULL){
    $allClasseCodeTitle = new classification();
    $allClasses = $allClasseCodeTitle->getAllClassTitle(); ?>
    <form method="POST" action="index.php?q=repository&categ=search&sub=byClasse">
        <select name="code_title">
            <?php
            foreach($allClasses as $classe){
            echo "<option value=\"".$classe['code_title']."\"> ".$classe['code_title']."</option>";} 
            ?>
        </select> <br/>
    <input type="submit" name="envoyer">
    <input type="reset" name="envoyer">
    </form>

<?php 
}else if($_POST['code_title']){
    $id = $_POST['code_title'];
    $id = new classification();
    $id->getAllrecordsIdClasse($id);
    echo "Avec un post ouvert ...";
}
?>