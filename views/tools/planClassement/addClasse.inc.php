<?php
require 'models/connexion.class.php';
$allclassification = new classification();

?>
 <?php 
  $tiltle=$allclassification->getAllClassTitle();
  $tiltle=$allclassification->setFetchMode(PDO::FETCH_ASSOC);



     ?>
<form method="post" action="">
   
    Code de classification : <input type="text" name="classification_code"><br/>
    Titre de classification :<input type="text" name="classification_type_title"><br/>
    type de classification : <select name="classification_type" id="">
   <?php foreach($tiltle->fetchAll() as $row) {
            echo "<option>" . $row["classification_type_title"] . "</option>";}?>
    </select><br>
    id Parent : <select name="classification_parent_id" >
        <?php
          foreach($tiltle->fetchAll() as $row) {
            echo "<option>" . $row["classification_title"] . "</option>";}?>
    </select><br/>
    Observation : <input type="textarea" name="classification_observation"><br/>
    <input type="submit"><input type="reset">
</form>

