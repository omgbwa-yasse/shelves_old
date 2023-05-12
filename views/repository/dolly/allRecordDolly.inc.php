<?php
require_once 'models/dolly/dollyRecordManager.class.php';

$allDolly = new dollyRecordManager();
$dollies = $allDolly ->getAllDollyRecord();


echo "<table border='1' width=\"800px\">";
echo "<th>Chariot </th> <th> Description </th><th> Nombre enregistrement </th><th>Action</th>";

foreach($dollies as $id){
        $dolly = new dollyRecord();
        $dolly -> setDollyRecordId($id['dolly_id']);
        $dolly -> setDollyRecordById();


echo "<tr>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=allrecords&id=".
        $dolly -> getDollyRecordId() ."\">"
        . $dolly -> getDollyRecordTitle() ."</a></td><td>".
        $dolly -> getDollyRecordObservation() ."</td><td> 
        <a href=\"index.php?q=repository&categ=dolly&sub=allrecords&id=\">". 
        $dolly -> countRecords()
        ."</td>
        <td><a href=\"#\">Option</a></td></tr>";
}



?>