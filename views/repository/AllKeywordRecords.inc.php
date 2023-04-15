<?php
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/keywordsManager.class.php';

    $allRecordsOfKeyword = new keywordsManager() ;
    $allRecordsOfKeyword -> getAllKeywords();


?>