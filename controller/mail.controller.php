<?php

    /* default  */      
        // mail
            if($_GET['q'] == "mail" && $_GET['categ'] == "mail" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "createMail" : include "views/mail/createMail.views.php";
                    break ;
                    case "allMail": include "views/mail/allMail.views.php";
                    break ;
                    case "view": include "views/mail/viewMail.views.php";
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
                    case "all": include "views/mail/mailReceived/all.views.php";
                    break ;
                    case "delete": include "views/mail/mailReceived/delete.views.php";
                    break ;
                    case "create": include "views/mail/mailReceived/create.views.php";
                    break ;
                    case "update": include "views/mail/mailReceived/update.views.php";
                    break ;
                    
                
                
                    default : include "views/mail/mailReceived/allMailReceived.views.php";
                }
    }
        // Couriels Envoyered
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailSended" && !empty($_GET['sub'])){
                switch($_GET['sub']){

                    case "all": include "views/mail/mailSended/all.views.php";
                    break ;
                    case "delete": include "views/mail/mailSended/delete.views.php";
                    break ;
                    case "create": include "views/mail/mailSended/create.views.php";
                    break ;
                    case "update": include "views/mail/mailSended/update.views.php";
                    break ;
                
                    default : include "views/mail/mailSended/all.views.php";
                }
    }
        //mail copy
            elseif($_GET['q'] == "mail" && $_GET['categ'] == "mailcopy" && !empty($_GET['sub'])){
                switch($_GET['sub']){
                    case "create" : include "views/mail/mailcopy/create.views.php";
                    break ;
                    case "all": include "views/mail/mailcopy/all.views.php";
                    break ;
                    case "update": include "views/mail/mailcopy/Update.views.php";
                    break ;
                    case "delete": include "views/mail/mailcopy/delete.views.php";
                    break ;
                
                    default : include "views/mail/mailcopy/allMailcopy.views.php";
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

      



         
        
    
         

?>