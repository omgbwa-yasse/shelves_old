<?php
include "template/sous_menu.inc.php";
?>
<p class="btnSousMenu">Enregistrement</p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=setting&categ=recordSupport&sub=all"> Support </a></li>
        <li><a href="index.php?q=setting&categ=recordStatus&sub=all"> Statut </a></li>
</ul>
<p class="btnSousMenu"> Contenant </p>
<ul class="optionSousMenu">  
        <li><a href="index.php?q=setting&categ=containerStatus&sub=all"> Statut </a></li>
</ul>
<p class="btnSousMenu">Utilisateur</p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=setting&categ=user&sub=all"> Utilisateur </a></li>
</ul>
<p class="btnSousMenu">Versement</p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=setting&categ=transfer&sub=all"> Versement </a></li>
</ul>
<p class="btnSousMenu">Communication</p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=setting&categ=transfer&sub=all"> Versement </a></li>
</ul>
<p class="btnSousMenu">Depôt </p>
<ul class="optionSousMenu">
        <li><a href="index.php?q=setting&categ=deposit&sub=all"> Versement </a></li>
</ul>

<?php
include "template/container.inc.php";
include_once "controller/setting.controller.php";
?>