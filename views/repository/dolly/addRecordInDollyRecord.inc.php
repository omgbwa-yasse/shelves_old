<?php
require_once 'models/dolly/dollyRecordManager.class.php';
require_once 'models/dolly/dollyRecord.class.php';
require_once 'models/repository/record.class.php';
require_once 'views/repository/records/display.inc.php';

$dolly = new dollyRecord();
$dolly -> setDollyRecordId($_GET['id']);
$dolly -> setDollyRecordById();
echo $dolly -> getDollyRecordTitle();

    echo "<br/> Ajouter...";
?>
<form  method="GET" action="index.php?q=repository&categ=dolly&sub=saveRecord&id=<?= $_GET['id'] ?>">
    
    <select value="record_id">
        <?php 
            $records = new recordsManager();
            $records = $records -> getAllrecordsId();
            foreach($records as $id){
                $record = new record();
                $record -> setRecordId($id['record_id']);
                $record -> getRecordById();
                echo "<option>". $record -> getRecordId() ."</option>";
            } 
        ?>
    </select>
    <br/>
    <input type="submit" value="ajouter">
</form>