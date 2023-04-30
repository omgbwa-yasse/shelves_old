<?php
require 'models/connexion.class.php';

$cnx = new PDO("mysql:host=localhost;dbname=dbms;charset=utf8","root", "");
?>
 <?php 
          $sql = "SELECT *
          FROM dbms.classification_type";
          $allClasse = $cnx->prepare($sql);
          $allClasse->execute();
          $result = $allClasse->setFetchMode(PDO::FETCH_ASSOC);?>
<form method="post" action="">
   
    Code de classification : <input type="text" name="classification_code"><br/>
    Titre de classification :<input type="text" name="classification_type_title"><br/>
    type de classification : <select name="classification_type" id="">
   <?php foreach($allClasse->fetchAll() as $row) {
            echo "<option>" . $row["classification_type_title"] . "</option>";}?>
    </select><br>
    id Parent : <select name="classification_parent_id" >
        <?php
        $sql = "SELECT *
        FROM dbms.classification_type
        JOIN dbms.classification ON classification_type.classification_type_id = classification.classification_type_id";
        $allClasse = $cnx->prepare($sql);
        $allClasse->execute();
        $result = $allClasse->setFetchMode(PDO::FETCH_ASSOC);
          foreach($allClasse->fetchAll() as $row) {
            echo "<option>" . $row["classification_title"] . "</option>";}?>
    </select><br/>
    Observation : <input type="textarea" name="classification_observation"><br/>
    <input type="submit"><input type="reset">
</form>

