<?php
include "template/sous_menu.inc.php";
?>
<p>Enregistrement</p>
<ul>
        <li><a href="index.php?q=setting&categ=recordSupport&sub=all"> Support </a></li>
        <li><a href="index.php?q=setting&categ=recordStatus&sub=all"> Statut </a></li>
        <li><a href="index.php?q=setting&categ=record&sub=all"> Enregistrement </a></li>
</ul>
<p>Utilisateur</p>
<ul>
        <li><a href="index.php?q=setting&categ=user&sub=all"> Utilisateur </a></li>
        <li><a href="index.php?q=setting&categ=userRole&sub=all"> Droit </a></li>
</ul>
<p>Versement</p>
<ul>
        <li><a href="index.php?q=setting&categ=transfer&sub=all"> Versement </a></li>
</ul>
<p>Communication</p>
<ul>
        <li><a href="index.php?q=setting&categ=transfer&sub=all"> Versement </a></li>
</ul>
<p>Depôt </p>
<ul>
        <li><a href="index.php?q=setting&categ=deposit&sub=all"> Versement </a></li>
</ul>

<?php
include "template/container.inc.php";
include_once "controller/setting.controller.php";
?>