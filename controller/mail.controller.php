<?php

    /* default  */    
if($_GET['q'] == "mail"){

        /* redirige si il y'a pas de categorie */
        if(empty($_GET['categ'])){
            include "views/repository/search/allrecords.inc.php" ;
        }else{
        // mail
            if($_GET['q'] == "mail" && $_GET['categ'] == "mail" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createMail" : include "views/mail/createMail.views.php";
                    break ;
                    case "allMail": include "views/mail/allMail.views.php";
                    break ;
                    case "allMailGrouped": include "views/mail/allMailGrouped.views.php";
                    break ;
                    case "updateMail": include "views/mail/updateMail.views.php";
                    break ;
                    case "deleteMail": include "views/mail/deleteMail.views.php";
                    break ;
                
                    default : include "views/mail/allMail.views.php";
                }
            }


        //mail basket
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailBasket" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createMailBasket" : include "views/mail/mailBasket/createMailBasket.views.php";
                    break ;
                    case "allMailBasket": include "views/mail/mailBasket/allMailBasket.views.php";
                    break ;
                    case "updateMailBasket": include "views/mail/mailBasket/UpdateMailBasket.views.php";
                    break ;
                    case "deleteMailBasket": include "views/mail/mailBasket/deleteMailBasket.views.php";
                    break ;
                
                    default : include "views/mail/mailBasket/allMailBasket.views.php";
                }
        }

        //mail container
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailContainer" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createMailContainer" : include "views/mail/mailContainer/createMailContainer.views.php";
                    break ;
                    case "allMailContainer": include "views/mail/mailContainer/allMailContainer.views.php";
                    break ;
                    case "updateMailContainer": include "views/mail/mailContainer/UpdateMailContainer.views.php";
                    break ;
                    case "deleteMailContainer": include "views/mail/mailContainer/deleteMailContainer.views.php";
                    break ;
                
                    default : include "views/mail/mailContainer/allMailContainer.views.php";
                }
    }

    //mail Docnum
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailDocnum" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createMailDocnum" : include "views/mail/mailDocnum/createMailDocnum.views.php";
                    break ;
                    case "allMailDocnum": include "views/mail/mailDocnum/allMailDocnum.views.php";
                    break ;
                    case "updateMailDocnum": include "views/mail/mailDocnum/UpdateMailDocnum.views.php";
                    break ;
                    case "deleteMailDocnum": include "views/mail/mailDocnum/deleteMailDocnum.views.php";
                    break ;
                
                    default : include "views/mail/mailDocnum/allMailDocnum.views.php";
                }
        }


        // mail priority
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailPriority" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createMailPriority" : include "views/mail/mailPriority/createMailPriority.views.php";
                    break ;
                    case "allMailPriority": include "views/mail/mailPriority/allMailPriority.views.php";
                    break ;
                    case "updateMailPriority": include "views/mail/mailPriority/UpdateMailPriority.views.php";
                    break ;
                    case "deleteMailPriority": include "views/mail/mailPriority/deleteMailPriority.views.php";
                    break ;
                
                    default : include "views/mail/mailPriority/allMailPriority.views.php";
                }
    }
        //mail Received
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailReceived" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "allMailReceived": include "views/mail/mailReceived/allMailReceived.views.php";
                    break ;
                    case "deleteMailReceived": include "views/mail/mailReceived/deleteMailReceived.views.php";
                    break ;
                
                    default : include "views/mail/mailReceived/allMailReceived.views.php";
                }
    }
        //mail Sended
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailSended" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "allMailSended": include "views/mail/mailSended/allMailSended.views.php";
                    break ;
                    case "deleteMailSended": include "views/mail/mailSended/deleteMailSended.views.php";
                    break ;
                
                    default : include "views/mail/mailSended/allMailSended.views.php";
                }
    }
        //mail Typology
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailTypology" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createMailTypology" : include "views/mail/mailTypology/createMailTypology.views.php";
                    break ;
                    case "allMailTypology": include "views/mail/mailTypology/allMailTypology.views.php";
                    break ;
                    case "updateMailTypology": include "views/mail/mailTypology/UpdateMailTypology.views.php";
                    break ;
                    case "deleteMailTypology": include "views/mail/mailTypology/deleteMailTypology.views.php";
                    break ;
                
                    default : include "views/mail/mailTypology/allMailTypology.views.php";
                }
    }

        //process 
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "process" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createprocess" : include "views/mail/process/createprocess.views.php";
                    break ;
                    case "allprocess": include "views/mail/process/allprocess.views.php";
                    break ;
                    case "updateprocess": include "views/mail/process/Updateprocess.views.php";
                    break ;
                    case "deleteprocess": include "views/mail/process/deleteprocess.views.php";
                    break ;
                
                    default : include "views/mail/process/allprocess.views.php";
                }
    }
        //Treatment Duration 
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "TreatmentDuration" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createTreatmentDuration" : include "views/mail/TreatmentDuration/createTreatmentDuration.views.php";
                    break ;
                    case "allTreatmentDuration": include "views/mail/TreatmentDuration/allTreatmentDuration.views.php";
                    break ;
                    case "updateTreatmentDuration": include "views/mail/TreatmentDuration/UpdateTreatmentDuration.views.php";
                    break ;
                    case "deleteTreatmentDuration": include "views/mail/TreatmentDuration/deleteTreatmentDuration.views.php";
                    break ;
                
                    default : include "views/mail/TreatmentDuration/allTreatmentDuration.views.php";
                }
    }




         
        
    
         }
    } 
?>