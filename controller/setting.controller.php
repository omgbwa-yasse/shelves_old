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
            }
        }
        
        if ($_GET['q'] == "setting" && $_GET['categ'] == "loanType" && !empty($_GET['sub'])) {
                switch($_GET['sub']){
                case 'view' : include 'views/setting/loanType/loanTypeView.inc.php';
                break;
                case 'save' : include 'views/setting/loanType/loanTypeSave.inc.php';
                break;
                case 'add' : include 'views/setting/loanType/loanTypeAdd.inc.php';
                break;
                case 'update' : include 'views/setting/loanType/loanTypeUpdate.inc.php';
                break;
                case 'delete' : include 'views/setting/loanType/loanTypeDelete.inc.php';
                break;
                case 'all' : include "views/setting/loanType/loanTypeAll.inc.php";
                break;
                }
            }

        if ($_GET['q'] == "setting" && $_GET['categ'] == "loanDuration" && !empty($_GET['sub'])) {
                    switch($_GET['sub']){
                case 'view' : include 'views/setting/loanDuration/loanDurationView.inc.php';
                break;
                case 'add' : include 'views/setting/loanDuration/LoanDurationAdd.inc.php';
                break;
                case 'save' : include 'views/setting/loanDuration/LoanDurationSave.inc.php';
                break;
                case 'update' : include 'views/setting/loanDuration/loanDurationUpdate.inc.php';
                break;
                case 'delete' : include 'views/setting/loanDuration/loanDurationDelete.inc.php';
                break;
                case 'all' : include "views/setting/loanDuration/loanDurationAll.inc.php";
                break;
                
            }
        }

    // Gestion des utilisateurs

        if ($_GET['q'] == "setting" && $_GET['categ'] == "customer" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/customer/customerAdd.inc.php';
                break;
                case 'save' : include 'views/setting/customer/customerSave.inc.php';
                break;
                case 'update' : include 'views/setting/customer/customerUpdate.inc.php';
                break;
                case 'delete' : include 'views/setting/customer/customerDelete.inc.php';
                break;
                case 'view' : include 'views/setting/customer/viewCustomer.views.php';
                break;
                case 'all' : include 'views/setting/customer/customerAll.inc.php';
                break;
                default : include 'views/error.views.php';
                
            }
        }
        if ($_GET['q'] == "setting" && $_GET['categ'] == "customerRole" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/customerRole/customerRoleAdd.views.php';
                break;
                case 'update' : include 'views/setting/customerRole/customerRoleUpdate.views.php';
                break;
                case 'save' : include 'views/setting/customerRole/customerRoleSave.views.php';
                break;
                case 'all' : include 'views/setting/customerRole/customerRoleAll.views.php';
                break;
                default : include 'views/error.views.php';
            }
        }
}}
?>