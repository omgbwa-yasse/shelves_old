<?php
if($_GET['q'] == "setting"){
    if(empty($_GET['categ'])){
        include 'views/setting/allRecordSupport.views.php';
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
        if ($_GET['q'] == "setting" && $_GET['categ'] == "user" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/user/addUser.views.php';
                break;
                case 'update' : include 'views/setting/user/updateUser.views.php';
                break;
                case 'delete' : include 'views/setting/user/deleteUser.views.php';
                break;
                case 'views' : include 'views/setting/user/viewsUser.views.php';
                break;
                case 'all' : include 'views/setting/user/allUser.views.php';
                break;
                default : include 'views/error.views.php';
            }
        }
        if ($_GET['q'] == "setting" && $_GET['categ'] == "userRole" && !empty($_GET['sub'])) {
            switch($_GET['sub']){
                case 'add' : include 'views/setting/addUserRole.views.php';
                break;
                case 'update' : include 'views/setting/updateUserRole.views.php';
                break;
                case 'delete' : include 'views/setting/deleteUserRole.views.php';
                break;
                case 'views' : include 'views/setting/viewsUserRole.views.php';
                break;
                case 'all' : include 'views/setting/allUserRole.views.php';
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
}}
?>