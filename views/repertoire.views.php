<?php
/*
if(isset($_GET['categ']) && $_GET['categ'] != 0){
    switch($_GET['categ']){
        case "allRecords" : "";
        break;
        case "create" : include "../views/repertoire/createRecords.views.php";
        break;
        case "update" : include "../views/repertoire/updateRecords.views.php";
        break;
        case "dolly" : include "../views/repertoire/dollyRecords.views.php";
        break;
    }
}
*/
echo '<ul>
        <li><a href="/'.'../shelves/'.'index?q=repertoire&categ=recherche"/> Recherche </a></li>
        <li><a href="/'.'../shelves/'.'index?q=repertoire&categ=create"/> Nouvel enregistrement </a></li>
        <li><a href="/'.'../shelves/'.'index?q=dolly&categ=container"/> Chariot de description </a></li>
        </ul>';

?>
