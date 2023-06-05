<?php

 /* default  */    
if($_GET['q'] == "deposit"){

        /* redirige si il y'a pas de categorie */
        if(empty($_GET['categ'])){
            include "views/error.view.php" ;
        }else{
        
        /* Case search */
        if($_GET['q'] == "deposit" && $_GET['categ'] == "room" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "add" : include "views/deposit/room/addRoom.inc.php";
                break ;
                case "view" : include "views/deposit/room/viewRoom.inc.php";
                break ;
                case "update" : include "views/deposit/room/updateRoom.inc.php";
                break ;
                case "save" : include "views/deposit/room/saveRoom.inc.php";
                break ;
                case "delete" : include "views/deposit/room/deleteRoom.inc.php";
                break ;
                case "all" : include "views/deposit/room/allRoom.inc.php";
                break ;
            }}


            /* Case create */
            else if($_GET['q'] == "deposit" && $_GET['categ'] == "shelve" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "add" : include "views/deposit/shelve/addShelve.inc.php";
                break ;
                case "view" : include "views/deposit/shelve/viewShelve.inc.php";
                break ;
                case "update" : include "views/deposit/shelve/updateShelve.inc.php";
                break ;
                case "save" : include "views/deposit/shelve/saveShelve.inc.php";
                break ;
                case "delete" : include "views/deposit/shelve/deleteShelve.inc.php";
                break ;
                case "all" : include "views/deposit/shelve/allShelve.inc.php";
                break ;
            }}



        /* Case create */
        else if($_GET['q'] == "deposit" && $_GET['categ'] == "container" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "add" : include "views/deposit/container/addContainer.inc.php";
                break ;
                case "view" : include "views/deposit/container/viewContainer.inc.php";
                break ;
                case "update" : include "views/deposit/container/updateContainer.inc.php";
                break ;
                case "save" : include "views/deposit/container/saveContainer.inc.php";
                break ;
                case "delete" : include "views/deposit/container/deleteContainer.inc.php";
                break ;
                case "all" : include "views/deposit/container/allContainer.inc.php";
                break ;
            }}
        
          /* Case create */
          else if($_GET['q'] == "deposit" && $_GET['categ'] == "containerProperty" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "add" : include "views/deposit/containerProperty/addContainerProperty.inc.php";
                break ;
                case "view" : include "views/deposit/containerProperty/viewContainerProperty.inc.php";
                break ;
                case "update" : include "views/deposit/containerProperty/updateContainerProperty.inc.php";
                break ;
                case "save" : include "views/deposit/containerProperty/saveContainerProperty.inc.php";
                break ;
                case "delete" : include "views/deposit/containerProperty/deleteContainerProperty.inc.php";
                break ;
                case "all" : include "views/deposit/containerProperty/allContainerProperty.inc.php";
                break ;
            }}

        /* Case dolly */
        else if($_GET['q'] == "deposit" && $_GET['categ'] == "dolly" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "new" : include "";
                break ;
                case "view" : include "";
                break ;
                case "update" : include "";
                break ;
                case "save" : include "";
                break ;
                case "delete" : include "";
                break ;
                case "all" : include "";
                break ;    
            }}
         }
    } 
?>