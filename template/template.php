<?php
include_once "template/header.inc.php"
?>

<header>
 <?php include_once 'template/search.inc.php'; ?> 
 <?php if(empty($_GET['q'])){ $_GET['q'] = "repository"; } ?> 
<nav>
    <ul>
        <li class="<?php if ($_GET['q'] =="repository") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=repository&categ=search&sub=allrecords">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M22 6H12l-2-2H4c-1.11 0-1.99.9-1.99 2L2 20c0 1.1.89 2 1.99 2h18a2 2 0 0 0 2-2V8c0-1.1-.9-2-2-2zm0 14H4V8h16v12z"/>
            <path d="M0 0h24v24H0z" fill="none"/></svg>
        Repertoire</a></li>
        <li class="<?php if ($_GET['q']=="versement") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=versement&categ=search&sub=allversement">
        <img src="" alt="">  
        
        Versement</a></li>
        <li class="<?php if ($_GET['q']=="loan") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=loan&categ=search&sub=allloan">
        <img src="" alt=""> 
        
        Communication</a></li>
        <li class="<?php if ($_GET['q']=="audit") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=audit&categ=default&sub=default">
        <img src="" alt="">    
        
        Audit</a></li>
        <li class="<?php if ($_GET['q']=="deposit") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=deposit&categ=search&sub=all">
         <img src="" alt="">   
        
        Dépôt</a></li>
        <li class="<?php if ($_GET['q']=="dolly") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=dolly&categ=records&sub=allDolly">
        <img src="" alt="">
        Chariot</a></li>
        <li class="<?php if ($_GET['q']=="tools") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=tools&categ=all&sub=all">
         <img src="" alt="">
        Outils de gestion</a></li>
        <li class="<?php if ($_GET['q']=="setting") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=setting"> 
        <svg width="20px" height="20px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#000000" d="M600.704 64a32 32 0 0 1 30.464 22.208l35.2 109.376c14.784 7.232 28.928 15.36 42.432 24.512l112.384-24.192a32 32 0 0 1 34.432 15.36L944.32 364.8a32 32 0 0 1-4.032 37.504l-77.12 85.12a357.12 357.12 0 0 1 0 49.024l77.12 85.248a32 32 0 0 1 4.032 37.504l-88.704 153.6a32 32 0 0 1-34.432 15.296L708.8 803.904c-13.44 9.088-27.648 17.28-42.368 24.512l-35.264 109.376A32 32 0 0 1 600.704 960H423.296a32 32 0 0 1-30.464-22.208L357.696 828.48a351.616 351.616 0 0 1-42.56-24.64l-112.32 24.256a32 32 0 0 1-34.432-15.36L79.68 659.2a32 32 0 0 1 4.032-37.504l77.12-85.248a357.12 357.12 0 0 1 0-48.896l-77.12-85.248A32 32 0 0 1 79.68 364.8l88.704-153.6a32 32 0 0 1 34.432-15.296l112.32 24.256c13.568-9.152 27.776-17.408 42.56-24.64l35.2-109.312A32 32 0 0 1 423.232 64H600.64zm-23.424 64H446.72l-36.352 113.088-24.512 11.968a294.113 294.113 0 0 0-34.816 20.096l-22.656 15.36-116.224-25.088-65.28 113.152 79.68 88.192-1.92 27.136a293.12 293.12 0 0 0 0 40.192l1.92 27.136-79.808 88.192 65.344 113.152 116.224-25.024 22.656 15.296a294.113 294.113 0 0 0 34.816 20.096l24.512 11.968L446.72 896h130.688l36.48-113.152 24.448-11.904a288.282 288.282 0 0 0 34.752-20.096l22.592-15.296 116.288 25.024 65.28-113.152-79.744-88.192 1.92-27.136a293.12 293.12 0 0 0 0-40.256l-1.92-27.136 79.808-88.128-65.344-113.152-116.288 24.96-22.592-15.232a287.616 287.616 0 0 0-34.752-20.096l-24.448-11.904L577.344 128zM512 320a192 192 0 1 1 0 384 192 192 0 0 1 0-384zm0 64a128 128 0 1 0 0 256 128 128 0 0 0 0-256z"/></svg>
        Parametre</a></li>
    </ul>
</nav>
</header>

