<?php 

if($_GET['q'] == "loan"){
    if($_GET['q'] == "loan" && $_GET['categ'] == "search" && !empty($_GET['sub'])){
            switch($_GET['sub']){
                case "all" : echo "tous les demandes";
                break ;
                case "organization" : echo "Enregistrer";
                break ;
                case "date" : echo "Date de communication";
                break ;
                case "class" : echo "Classe"; 
                break ;
                case "user" : echo "Utilisateur"; 
                break ;
            }
    }
    else if($_GET['q'] == "loan" && $_GET['categ'] == "create" && !empty($_GET['sub'])){
        switch($_GET['sub']){
            case "add" : echo "Creer";
            break ;
            case "save" : echo "Enregistrer";
            break ;
            case "update" : echo "Modifier";
            break ;
            case "delete" : echo "Supprimer"; 
            break ;
        }
    }
    else if($_GET['q'] == "loan" && $_GET['categ'] == "status" && !empty($_GET['sub'])){
        switch($_GET['sub']){
            case "ask" : echo "Creer";
            break ;
            case "courrent" : echo "Creer";
            break ;
            case "cancel" : echo "Enregistrer";
            break ;
            case "archives" : echo "Modifier";
            break ;
        }
    }
}

?>