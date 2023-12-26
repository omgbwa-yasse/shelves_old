<?php
include "template/sous_menu.inc.php";
?>
<p class="btnSousMenu">Paramètre généraux</p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=setting&categ=recordStatus&sub=all"> Enregistrement </a></li>
        <li><a href="index.php?q=setting&categ=recordSupport&sub=all"> Support </a></li>  
        <li><a href="index.php?q=setting&categ=loan&sub=all">Communication</a></li>
        <li><a href="index.php?q=setting&categ=customer&sub=all"> Usager </a></li>
        <li><a href="index.php?q=setting&categ=transfer&sub=all"> Versement </a></li>
        <li><a href="index.php?q=setting&categ=containerStatus&sub=all">Contenant </a></li> 
        <li><a href="index.php?q=setting&categ=transfer&sub=all"> Audit </a></li>
        <li><a href="index.php?q=setting&categ=deposit&sub=all">Depôt</a></li>
        <li><a href="index.php?q=setting&categ=user&sub=all">Opérateur d'archives </a></li>
</ul>
<p class="btnSousMenu">Autres paramètres</p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=setting&categ=recordSupport&sub=all"> recherche</a></li>
        <li><a href="index.php?q=setting&categ=recordStatus&sub=all"> xxxx </a></li>  
        <li><a href="index.php?q=setting&categ=containerStatus&sub=all"> xxxxx </a></li>
</ul>

<?php
include "template/container.inc.php";
include_once "controller/setting.controller.php";
?>