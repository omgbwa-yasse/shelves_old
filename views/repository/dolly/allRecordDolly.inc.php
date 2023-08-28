<?php
require_once 'models/dolly/dollyRecordManager.class.php';
require_once 'models/dolly/dollyRecord.class.php';

$allDolly = new dollyRecordManager();
$dollies = $allDolly ->getAllDollyRecord();


echo "<table border='1' width=\"800px\">";
echo "<th>Chariots des enregistrements </th> <th> Description </th><th> Nombre enregistrement";

foreach($dollies as $id){
        $dolly = new dollyRecord();
        $dolly -> setDollyRecordId($id['dolly_id']);
        $dolly -> setDollyRecordById();

        echo "<tr>
        <td><a href='index.php?q=repository&categ=dolly&sub=view&id=" . $dolly->getDollyRecordId() . "'>" . $dolly->getDollyRecordTitle() . "</a></td>
        <td>" . $dolly->getDollyRecordObservation() . "</td>
        <td><a href='index.php?q=repository&categ=dolly&sub=view&id=" . $dolly->getDollyRecordId() . "'>" . $dolly->countRecords() . "</a></td>
       </tr>";
       
}


?>