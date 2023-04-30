<?php


function displayRecord($record){
    echo "<div style=\"margin-left:100px;\" >";
    // Aficher les enregistrement
    echo "<table border=3> 
    <tr><th>". $record-> getRecordTitle() ."</th></tr> 
    <tr><td>". $record-> getRecordNui() ."</td></tr>
    <tr><td>". $record -> getRecordDateStart() ." ". $record -> getRecordDateEnd()  ."</td></tr>
    <tr><td>". $record -> getRecordObservation()  ."</td></tr>
    <tr><td>". $record -> getRecordContainerTitle() ."</td></tr>
    <tr><td>". $record -> getRecordClasseCodeTitle() ."</td></tr>
    <tr><td>". $record -> getRecordLinkId() ."</td></tr>
    <tr><td>";

    // Afficher les mots clés associés
    $KeywordsId = $record -> getAllKeywordsIdByRecordId();
    if(isset($KeywordsId)){
    foreach($KeywordsId as $KeywordId){
    $word = new keyword();
    $word -> setKeywordId($KeywordId['keyword_id']);
    echo $word -> getKeywordById() . " ;";
    }}
    
    echo "</td></tr></table>";
    echo "</div>";












}?>