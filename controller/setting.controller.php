<?php
if($_GET['q'] == "setting"){
    if(empty($_GET['categ'])){
        include "views/setting/homeSetting.views.php";
    }else{
        if ($_GET['q'] == "setting" && $_GET['categ'] == "recordSupport" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include "views/setting/recordSupport/addRecordSupport.views.php";
                break;
                case 'update' : include "views/setting/recordSupport/updateRecordSupport.views.php";
                break;
                case 'delete' : include "views/setting/recordSupport/deleteRecordSupport.views.php";
                break;
                case 'views' : include "views/setting/recordSupport/viewsRecordSupport.views.php";
                break;
                case 'all' : include "views/setting/recordSupport/allRecordSupport.views.php";
                break;
                case 'save' : include "views/setting/recordSupport/saveRecordSupport.views.php";
                break;
                default : include "views/error.views.php";
            }
        }
        if ($_GET['q'] == "setting" && $_GET['categ'] == "recordStatus" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/recordStatus/addRecordStatus.views.php';
                break;
                case 'update' : include 'views/setting/recordStatus/updateRecordStatus.views.php';
                break;
                case 'delete' : include 'views/setting/recordStatus/deleteRecordStatus.views.php';
                break;
                case 'views' : include 'views/setting/recordStatus/viewsRecordStatus.views.php';
                break;
                case 'all' : include 'views/setting/recordStatus/allRecordStatus.views.php';
                break;
                case 'save' : include 'views/setting/recordStatus/saveRecordStatus.views.php';
                break;
                default : include 'views/error.views.php';
            }
        }

        if ($_GET['q'] == "setting" && $_GET['categ'] == "containerStatus" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/containerStatus/addContainerStatus.views.php';
                break;
                case 'update' : include 'views/setting/containerStatus/updateContainerStatus.views.php';
                break;
                case 'delete' : include 'views/setting/containerStatus/deleteContainerStatus.views.php';
                break;
                case 'views' : include 'views/setting/containerStatus/viewsContainerStatus.views.php';
                break;
                case 'all' : include 'views/setting/containerStatus/allContainerStatus.views.php';
                break;
                case 'save' : include 'views/setting/containerStatus/saveContainerStatus.views.php';
                break;
                default : include '';
            }
        }




        if ($_GET['q'] == "setting" && $_GET['categ'] == "user" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/user/addUser.views.php';
                break;
                case 'addControl' : include 'views/setting/user/saveUser.views.php';
                break;
                case 'update' : include 'views/setting/user/updateUser.views.php';
                break;
                case 'delete' : include 'views/setting/user/deleteUser.views.php';
                break;
                case 'view' : include 'views/setting/user/viewUser.views.php';
                break;
                case 'all' : include 'views/setting/user/allUser.views.php';
                break;
                default : include 'views/error.views.php';
            }
        }
        if ($_GET['q'] == "setting" && $_GET['categ'] == "userRole" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/userRole/addUserRole.views.php';
                break;
                case 'update' : include 'views/setting/userRole/updateUserRole.views.php';
                break;
                case 'delete' : include 'views/setting/userRole/deleteUserRole.views.php';
                break;
                case 'views' : include 'views/setting/userRole/viewsUserRole.views.php';
                break;
                case 'save' : include 'views/setting/userRole/saveUserRole.views.php';
                break;
                case 'all' : include 'views/setting/userRole/allUserRole.views.php';
                break;
                default : include 'views/error.views.php';
            }
        }
        if ($_GET['q'] == "setting" && $_GET['categ'] == "record" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/addRecordSetting.views.php';
                break;
                case 'update' : include 'views/setting/updateRecordSetting.views.php';
                break;
                case 'delete' : include 'views/setting/deleteRecordSetting.views.php';
                break;
                case 'views' : include 'views/setting/viewsRecordSetting.views.php';
                break;
                case 'all' : include 'views/setting/allRecordSetting.views.php';
                break;
                default : include 'views/error.views.php';
            }
        }
        if ($_GET['q'] == "setting" && $_GET['categ'] == "loan" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                // All paramèter
                case 'all' : include 'views/setting/loan/loanSetting.inc.php';
                break;

                // Type of loan
                case 'type' : include 'views/setting/laon/viewLoan.inc.php';
                break;
                case 'saveType' : include 'views/setting/loan/loanTypeSave.inc.php';
                break;
                case 'addType' : include 'views/setting/loan/loanTypeAdd.inc.php';
                break;
                case 'updateType' : include '';
                break;
                case 'deleteType' : include '';
                break;
                case 'allType' : include "views/setting/loan/loanTypeAll.inc.php";
                break;


                // Duration
                case 'duration' : include 'views/setting/laon/loanDurationView.inc.php';
                break;
                case 'addDuration' : include 'views/setting/loan/LoanDurationAdd.inc.php';
                break;
                case 'saveDuration' : include 'views/setting/loan/LoanDurationSave.inc.php';
                break;
                case 'updateDuration' : include '';
                break;
                case 'deleteDuration' : include '';
                break;
                case 'allDuration' : include "views/setting/loan/loanDurationAll.inc.php";
                break;
                
            }
        }
}}
?>