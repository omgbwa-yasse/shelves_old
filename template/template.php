<?php
$q ="repertoire";
if (isset($_GET['q'])){
   $q = $_GET['q']; 
}

 include_once "template/header.inc.php"

?>

<header>
 <h1>Shelves </h1>
 <h2>Opensource records management solftware </h2>
 <hr/>  
</header>
<nav>
    <ul>
        <li class="<?php if ($q=="repertoire") {echo "active"; } else  {echo "";}?>"><a href ="../shelves/index.php?q=repertoire">Repertoire</a></li>
        <li class="<?php if ($q=="versement") {echo "active"; } else  {echo "";}?>"><a href ="../shelves/index.php?q=versement">Versement</a></li>
        <li class="<?php if ($q=="demande") {echo "active"; } else  {echo "";}?>"><a href ="../shelves/index.php?q=demande">Demande</a></li>
        <li class="<?php if ($q=="deposit") {echo "active"; } else  {echo "";}?>"><a href ="../shelves/index.php?q=deposit">Dépôt</a></li>
        <li class="<?php if ($q=="dolly") {echo "active"; } else  {echo "";}?>"><a href ="../shelves/index.php?q=dolly">Chariot</a></li>
        <li class="<?php if ($q=="outilsGestion") {echo "active"; } else  {echo "";}?>"><a href ="../shelves/index.php?q=outilsGestion">Outils de gestion</a></li>
        <li class="<?php if ($q=="parametre") {echo "active"; } else  {echo "";}?>"><a href ="../shelves/index.php?q=parametre"> Parametre</a></li>
    </ul>
</nav>

