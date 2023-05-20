<?php
require_once "models/setting/recordSupport.class.php";

if(isset($_POST['title'])){
    $support = new recordSupport();
    $support -> setRecordSupportTitle($_POST['title']);
    $support -> setRecordSupportObservation($_POST['observation']);
    if($support->saveRecordSupport()){
        $support ->setRecordSupportByTitle($_POST['title']);
        header('Location: index.php?q=setting&categ=recordSupport&sub=views&id='. $support->getRecordSupportId());
    } else{
        echo "echec enregistrement...";
    }
}
?>