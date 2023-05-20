<?php
if ($_GET['q'] == "setting" && $_GET['categ'] == "recordSupport" && !empty($_GET['sub'])) {
    switch($_GET['sub']){
        case 'add' : include 'views/setting/addRecordSupport.views.php';
        break;
        case 'update' : include 'views/setting/updateRecordSupport.views.php';
        break;
        case 'delete' : include 'views/setting/deleteRecordSupport.views.php';
        break;
        case 'views' : include 'views/setting/viewsRecordSupport.views.php';
        break;
        case 'all' : include 'views/setting/allRecordSupport.views.php';
        break;
    }
}
if ($_GET['q'] == "setting" && $_GET['categ'] == "recordStatus" && !empty($_GET['sub'])) {
    switch($_GET['sub']){
        case 'add' : include 'views/setting/addRecordStatus.views.php';
        break;
        case 'update' : include 'views/setting/updateRecordStatus.views.php';
        break;
        case 'delete' : include 'views/setting/deleteRecordStatus.views.php';
        break;
        case 'views' : include 'views/setting/viewsRecordStatus.views.php';
        break;
        case 'all' : include 'views/setting/allRecordStatus.views.php';
        break;
    }
}
if ($_GET['q'] == "setting" && $_GET['categ'] == "user" && !empty($_GET['sub'])) {
    switch($_GET['sub']){
        case 'add' : include 'views/setting/addUser.views.php';
        break;
        case 'update' : include 'views/setting/updateUser.views.php';
        break;
        case 'delete' : include 'views/setting/deleteUser.views.php';
        break;
        case 'views' : include 'views/setting/viewsUser.views.php';
        break;
        case 'all' : include 'views/setting/allUser.views.php';
        break;
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
    }
}












?>