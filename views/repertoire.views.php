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
        <p>Recherche</p>
        <ul>        
            <li>
                <a href="/'.'../shelves/'.'index?q=repertoire&categ=recherche&sub=allrecords"/> Tous les enregistrements </a>
            </li>
            <li>
                <a href="/'.'../shelves/'.'index?q=repertoire&categ=recherche&sub=allorgazination"/> Recherche par detenteur </a>
            </li>
            <li>
                <a href="/'.'../shelves/'.'index?q=repertoire&categ=recherche&sub=alldate"/> Recherche par date </a>
            </li>
            <li>
                <a href="/'.'../shelves/'.'index?q=repertoire&categ=recherche&sub=allkeyword"/> Recherche par mots-clés </a>
            </li>
            <li>
                <a href="/'.'../shelves/'.'index?q=repertoire&categ=recherche&sub=allclasse"/> Recherche par classe </a>
            </li>
        </ul>
        <p>Enregistrements</p>
        <ul>
            <li><a href="/'.'../shelves/'.'index?q=repertoire&categ=create&sub=new"/>Nouvel enregistrement </a></li>
            <li><a href="/'.'../shelves/'.'index?q=repertoire&categ=create&sub=last"/>Derniers enregistrements </a></li>
        </ul>
        <p>Chariot</p>
        <ul>
            <li><a href="/'.'../shelves/'.'index?q=dolly&categ=container&sub=alldolly"/> Tous les chariot de description </a></li>
            <li><a href="/'.'../shelves/'.'index?q=dolly&categ=container&sub=create"/> Ajouter un chariot de description </a></li>
        </ul>';

?>
