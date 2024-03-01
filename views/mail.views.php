<?php 
    include "template/sous_menu.inc.php"; 
    
?>
<p class="btnSousMenu">Recherche</p>
<ul class="optionSousMenu">  
    <li>
        <a href="index.php?q=mail&categ=mailDocnum&sub=create">Creer un document numerique </a>
    </li>
    <li>
        <a href="index.php?q=mail&categ=mail&sub=allmail">  afficher  les Couriels</a>
    </li>   
    <li>
        <a href="index.php?q=mail&categ=mailSended&sub=all">  afficher  les Couriels Envoyé</a>

    </li>     
    <li>
        <a href="index.php?q=mail&categ=mailReceived&sub=all">  afficher  les Couriels Reçu</a>
        
    </li> 
    <li>
        <a href="index.php?q=mail&categ=mailReceived&sub=allpending">  afficher  les Couriels Entrant</a>
        
    </li>
   
    
</ul>


        
<p class="btnSousMenu">Courriel</p>
<ul class="optionSousMenu">
    <li>
        <a href="index.php?q=mail&categ=mail&sub=createMail">  Créer un Couriel</a>
    </li>  
    <li><a href="index.php?q=mail&categ=mailReceived&sub=create"> Recevoir </a></li>
    <li><a href="index.php?q=mail&categ=mailSended&sub=create"> Transmettre </a></li>
</ul>

<!-- <p class="btnSousMenu">Activité </p>
<ul class="optionSousMenu">
    <li>
        <a href="index.php?q=mail&categ=mailActivity&sub=all">  Gérer  les Activitées</a>
    </li>   
</ul> -->


<p class="btnSousMenu">Paramètre</p>
<ul class="optionSousMenu">
    <li>
        <a href="index.php?q=mail&categ=mailCopy&sub=all">  Gérer  les types de copies </a>

    </li>  
    <li>
        <a href="index.php?q=mail&categ=mailPriority&sub=allmailPriority">  Gérer  les Niveaux de Priorité </a>
        
    </li>  

    <li>
        <a href="index.php?q=mail&categ=mailTypology&sub=all">  Gérer  les Typologies  </a>
        
    </li> 
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


