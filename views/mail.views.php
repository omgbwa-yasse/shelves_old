<?php 
    include "template/sous_menu.inc.php"; 
    
?>
<p class="btnSousMenu">Recherche</p>
<ul class="optionSousMenu">  
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail">  afficher  les Couriel</a>
    </li>      
    <li>
        <a href="index.php?q=mail&categ=mail&sub=createMail">  Creer un Couriel</a>
    </li>   
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail"> Tous afficher </a>
    </li>
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail"> Par affaire </a>
    </li>
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail"> Par référence </a>
    </li>
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail"> Par activité </a>
    </li>
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail"> Par date </a>
    </li>
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail"> Par détenteur </a>
    </li>
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail"> Par producteur </a>
    </li>
    
</ul>
        
<p class="btnSousMenu">Courriel</p>
<ul class="optionSousMenu">
    <li><a href="#"> Recevoir </a></li>
    <li><a href="#"> Transmettre </a></li>
    <li><a href="index.php?q=mail&categ=process&sub=createProcess"> Affaire </a></li>
</ul>


<p class="btnSousMenu">Gestion des espaces</p>
<ul class="optionSousMenu">
    <li><a href="#"> Salles </a></li>
    <li><a href="#"> Etagières </a></li>
    <li><a href="#"> Contenants </a></li>
    <li><a href="#"> Parapheurs </a></li>
</ul>
            
<p class="btnSousMenu">Chariot</p>
<ul class="optionSousMenu">
    <li><a href="#"> Creer un chariot </a></li>
    <li><a href="#"> Gestion </a></li>
</ul>
<?php
    include_once "template/container.inc.php";
    include_once "controller/mail.controller.php";
    
    
?>


