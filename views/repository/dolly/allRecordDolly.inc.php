<?php
require_once 'models/dolly/dollyRecordManager.class.php';

$allDolly = new dollyRecordManager();
$dollies = $allDolly ->getAllDollyRecord();

echo "<table border='1' width=\"800px\">";
echo "<th>Chariot </th> <th> Description </th><th> Nombre enregistrement </th><th>Action</th>";

foreach($dollies as $dolly){
echo "<tr>
        <td><a href=\"index.php?q=repository&categ=dolly&sub=allrecords&id=".$dolly['dolly_id'] ."\">"
        . $dolly['dolly_title'] ."</a></td><td>". $dolly['dolly_observation'] ."</td><td> 
        <a herf=\"index.php?q=repository&categ=dolly&sub=allrecords&id=\"> (10) </td>
        <td><a href=\"#\">Option</a></td></tr>";
}



?>