<?php

require_once 'models/repository/keyword.class.php';
require_once 'models/repository/recordsManager.class.php';
require_once 'models/repository/record.class.php';

$records = new recordsManager();

$listRecordsId = $records-> MgGetRecordsByDates($_POST['date_start'],$_POST['date_end']);



foreach($listRecords as $id){
    $record = new records();
    $record->setRecordId($id['records_id']);
    $record-> getRecordById();

    // Aficher les enregistremen
    echo "<table border=0> 
        <th>". $record-> getRecordTitle() ."</th></tr> 
        <td>". $record-> getRecordNui() ."</td>  </tr>
        <td>". $record -> getRecordDateStart() ."". $record -> getRecordDateEnd()  ."</td>  </tr>
        <td>". $record -> getRecordObservation()  ."</td>  </tr>
        <td>". $record -> getRecordContainerTitle() ."</td>  </tr>
        <td>". $record -> getRecordClasseCodeTitle() ."</td>  </tr>
        <td>". $record -> getRecordLinkId() ."</td>  </tr>
        <td>";

    // Afficher les mots clés associés
    $KeywordsId = $record -> getAllKeywordsIdByRecordId();
    if(isset($KeywordsId)){
    foreach($KeywordsId as $KeywordId){
        $word = new keyword();
        $word -> setKeywordId($KeywordId['keyword_id']);
        echo $word -> getKeywordById() . " ;";
        
    }

}}












?>