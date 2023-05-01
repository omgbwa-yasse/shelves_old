<?php
$q ="repertoire";
if (isset($_GET['q'])){
   $q = $_GET['q']; 
} else{
    $q = 'repository';
}
include_once "template/header.inc.php"
?>

<header>
 <?php include_once 'template/search.inc.php'; ?> 
<nav>
    <ul>
        <li class="<?php if ($q=="repertoire") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=repository&categ=search&sub=allrecords">Repertoire</a></li>
        <li class="<?php if ($q=="versement") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=versement&categ=search&sub=allversement">Versement</a></li>
        <li class="<?php if ($q=="loan") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=loan&categ=search&sub=allloan">Communication</a></li>
        <li class="<?php if ($q=="audit") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=audit&categ=default&sub=default">Audit</a></li>
        <li class="<?php if ($q=="deposit") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=deposit&categ=search&sub=all">Dépôt</a></li>
        <li class="<?php if ($q=="dolly") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=dolly&categ=records&sub=allDolly">Chariot</a></li>
        <li class="<?php if ($q=="outilsGestion") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=outilsGestion&categ=all&sub=all">Outils de gestion</a></li>
        <li class="<?php if ($q=="parametre") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=parametre"> Parametre</a></li>
    </ul>
</nav>
</header>

