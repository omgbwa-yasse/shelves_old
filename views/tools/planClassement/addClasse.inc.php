<?php
include_once 'models/tools/classe.class.php';
$title = new classification() ;

?>
<?php 
       ?>
<form method="post" action="">
    <table style="margin:10px;">

        <tr>
            <td>Code de classification : </td>
            <td><input type="text" name="classification_code"></td>
        </tr>
        <tr>
            <td>Titre de classification :</td>
            <td><input type="text" name="classification_type_title"></td>
        </tr>
        <tr>
            <td>type de classification : </td>
            <td><select name="classification_type" id="">
                 <?php
               
                $title->getAllClassTitle();
 
                ?>
                  
                </select></td>
        </tr>
        <tr>
            <td> id Parent :</td>
            <td> <select name="classification_parent_id">
            <?php
               
               $title->getAllClassid();

               ?>
                
 
                </select></td>
        </tr>
        <tr>
            <td>Observation : </td>
            <td><input type="textarea" name="classification_observation"></td>
        </tr>
        <tr>
            <td> <input type="submit"></td>
            <td><input type="reset"></td>
        </tr>
    </table>

</form>