<?php include "template/sous_menu.inc.php"; ?>

<p>Etats</p>
<ul>        
    <li><a href="#">Cycle de vie</a></li>
    <li><a href="#">Dépôt (volumétrie)</a></li>
    <li><a href="#">Versement</a></li>
    <li><a href="#">Description</a></li>
    <li><a href="#">Communication</a></li>
</ul>
<?php

include "template/container.inc.php";
    /* Case create */



if($q == "repository" && $_GET['categ'] == "create" && isset($_GET['sub'])){
    switch($_GET['sub']){
        case "lifecycle" : include "#";
        break ;
        case "Volume" : include "#";
        break ;
        case "versement" : include "#"; 
        break ;
        case "Description" : include "#"; 
        break ;
        case "Communication" : include "#";
        break ;

    }
}

?>


