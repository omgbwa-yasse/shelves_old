<?php
include_once 'models/setting/recordSupport.class.php';

$support = new RecordSupport();
$support -> setRecordSupportById($_GET['id']);
if($support -> deleteRecordSupport()){
    header('Location: index.php?q=setting&categ=recordSupport&sub=all');
}
?>