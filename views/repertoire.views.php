<?php include "template/sous_menu.inc.php"; ?>

        <?php
        echo '
            <p>Recherche</p>
                <ul>        
                    <li>
                        <a href="/'.'../shelves/'.'index?q=repertoire&categ=search&sub=allrecords"/> Tous les enregistrements </a>
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

include "template/container.inc.php";
if($_GET['q'] == "repertoire" && $_GET['categ'] == "search" && $_GET['sub'] == "allrecords"){
    include "views/inventory/allrecords.inc.php";
}
?>


