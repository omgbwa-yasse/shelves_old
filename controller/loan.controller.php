<?php 

if($_GET['q'] == "loan"){
    if($_GET['q'] == "loan" && $_GET['categ'] == "search" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "all" : echo "tous les demandes";
                break ;
                case "organization" : echo "organisation";
                break ;
                case "date" : echo "Date de communication";
                break ;
                case "class" : echo "Classe"; 
                break ;
                
                case "user" : echo "Utilisateur"; 
                break ;
                case "last" : echo "Derniers engistrements"; 
                break ;
            }
    }
    else if($_GET['q'] == "loan" && $_GET['categ'] == "create" && !empty($_GET['sub'])){
        switch($_GET['sub']){
            case "add" : include "views/loan/addLoan.inc.php";
            break ;
            case "save" : include "views/setting/loan/loanTypeSave.inc.php";
            break ;
            case "update" : echo "Modifier";
            break ;
            case "delete" : echo "Supprimer"; 
            break ;
        }
    }
    else if($_GET['q'] == "loan" && $_GET['categ'] == "status" && !empty($_GET['sub'])){
        switch($_GET['sub']){
            case "ask" : echo "Demandes à traiter";
            break ;
            case "courrent" : echo "Demande en cours";
            break ;
            case "cancel" : echo "Demandes annulées";
            break ;
            case "archives" : echo "Demandes archivées";
            break ;
        }
    }
}

?>