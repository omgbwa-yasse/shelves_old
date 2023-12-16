<?php
function menu(){
        switch($_GET['q']){
                case "mail" : include 'views/mail.views.php';
                break;
                case "repository" : include 'views/repository.views.php';
                break;
                case "transfer" : include 'views/transfer.views.php';
                break;
                case "loan" : include 'views/loan.views.php';
                break;
                case "deposit" : include 'views/deposit.views.php';
                break;
                case "dolly" : include 'views/dolly.views.php';
                break;
                case "audit" : include 'views/audit.views.php';
                break;
                case "tools" : include 'views/tools.views.php';
                break;
                case "setting" : include 'views/setting.views.php';
                break;
                case "connexion" : include 'views/connexion/connexionForm.views.php';
                break;
         }
        }


?>