<?php

    /* default  */    
if($_GET['q'] == "repository"){

        /* redirige si il y'a pas de categorie */
        if(empty($_GET['categ'])){
            include "views/repository/search/allrecords.inc.php" ;
        } 
        else if(!empty($_GET['categ'])){
        /* Case create */
        if($_GET['q'] == "repository" && $_GET['categ'] == "create" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "new" : include "views/repository/records/createRecords.inc.php";
                break ;
                case "newSave" : include "views/repository/records/saveRecords.inc.php";
                break ;
                case "update" : include "views/repository/records/updateRecords.inc.php";
                break ;
                case "delete" : include "views/repository/records/deleteRecord.inc.php"; 
                break ;
                case "child" : include "views/repository/records/createRecordsSub.inc.php";
                break ;
                default : include "views/repository/records/createRecords.inc.php";
            }
        }
        
        /* Case search */
        else if($_GET['q'] == "repository" && $_GET['categ'] == "search" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "last" : include "views/repository/search/lastRecords.inc.php";
                break ;
                case "display" : include "views/repository/search/displayRecordsSelf.inc.php";
                break ;
                case "allrecords" : include "views/repository/search/allrecords.inc.php";
                break ;
                case "selectClasse" : include "views/repository/search/selecteClasse.inc.php"  ;
                break ;
                case "byClasse" : include "views/repository/search/searchByClasse.inc.php";
                break ;  
                case "byClasseId" : include "views/repository/search/searchByClasseId.inc.php";
                break ;
                case "byKeyword" : include "views/repository/search/searchAllKeyword.inc.php";
                break ;
                case "byKeywordId" :  include "views/repository/search/searchByKeywordId.inc.php";
                break ;
                case "searchByKeyword" : include "views/repository/search/searchByKeyword.inc.php" ;
                break ;
                case "byDateForm" : include "views/repository/search/searchRecordsByDates.inc.php";
                break ;
                case "organization" : include "views/repository/search/displayByOrganization.inc.php";
                break ;
                case "allOrganization" : include "views/repository/search/searchByOrganization.inc.php";
                break ;
                case "byDatesResult" : include "views/repository/search/displayRecordsByDates.inc.php";
                break ;
                case "recordChild" : include "views/repository/search/displayRecordsChild.inc.php";
                break ;
                case "default" : include "views/repository/search/displayQuery.inc.php";
                break ;
                default : include "views/repository/search/allrecords.inc.php";
                    }
                
                }
         }
    } 
?>