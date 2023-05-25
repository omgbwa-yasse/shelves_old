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
        <img src="template/css/svg/documents-svgrepo-com.svg" alt="">  
        
        Versement</a></li>
        <li class="<?php if ($_GET['q']=="loan") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=loan&categ=search&sub=allloan">
        <img src="template/css/svg/communication-conversation-help-svgrepo-com.svg" alt=""> 
        
        Communication</a></li>
        <li class="<?php if ($_GET['q']=="deposit") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=audit&categ=default&sub=default">
        <img src="template/css/svg/audit-report-svgrepo-com.svg" alt="">    
        
        Audit</a></li>
        <li class="<?php if ($_GET['q']=="audit") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=deposit&categ=search&sub=all">
         <img src="template/css/svg/deposit-svgrepo-com.svg" alt="">   
        
        Dépôt</a></li>
        <li class="<?php if ($_GET['q']=="dolly") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=dolly&categ=records&sub=allDolly">
        <img src="template/css/svg/dolly-solid-svgrepo-com.svg" alt="">
        Chariot</a></li>
        <li class="<?php if ($_GET['q']=="tools") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=tools&categ=all&sub=all">
         <img src="template/css/svg/tools-svgrepo-com.svg" alt="">
        Outils de gestion</a></li>
        <li class="<?php if ($_GET['q']=="setting") {echo "active"; } else  {echo "";}?>"><a href ="index.php?q=setting"> 
        <img src="template/css/svg/setting-svgrepo-com.svg" alt="">
        Parametre</a></li>
    </ul>
</nav>
</header>

