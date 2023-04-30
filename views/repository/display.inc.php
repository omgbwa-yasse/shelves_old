<?php
require_once 'models/repository/keyword.class.php';

function displayRecord($record){
    echo "<div style=\"margin-left:50px;margin-top:50px; border:solid 1px red;text-align:left;width:900px;\" >";
    // Aficher les enregistrement
    $record -> setRecordClasseIdByCodeTitle();
    echo "<table border=0> 
    <tr><th style=\"font-size:20px; color:grey\">". $record-> getRecordTitle() ."</th></tr> 
    <tr><td>". $record-> getRecordNui() ."</td></tr>
    <tr><td>". $record -> getRecordDateStart() ." ". $record -> getRecordDateEnd()  ."</td></tr>
    <tr><td>". $record -> getRecordObservation()  ."</td></tr>
    <tr><td>". $record -> getRecordContainerTitle() ."</td></tr>
    <tr><td><a href=\"index.php?q=repository&categ=search&sub=byClasseId&id=".$record ->getRecordClasseId()."\">". $record -> getRecordClasseCodeTitle() ."</a></td></tr>
    <tr><td>". $record -> getRecordLinkId() ."</td></tr>
    <tr><td>";

    // Afficher les mots clés associés
    $KeywordsId = $record -> getAllKeywordsIdByRecordId();
    $KeywordsId = $KeywordsId->fetchAll(PDO::FETCH_ASSOC);
    if(isset($KeywordsId)){
            foreach($KeywordsId as $KeywordId){
                    $word = new keyword();
                    $word -> setKeywordId($KeywordId['keyword_id']); 
                    echo "<a href=\"index.php?q=repository&categ=search&sub=byKeywordId&id=".$KeywordId['keyword_id']."\">";
                    echo $word -> getKeywordById();
                    echo "</a> : " ;
            }
            echo "<div style=\"background-color:pink;border:solid 1px black;text-align:left;margin-top:10px; width:895px;\" >";
            echo "<a href=\"index.php?q=repository&categ=create&sub=delete&id=". $record->getRecordId() ." \">Supprimer</a>";
            echo "</div>";
        }
    echo "</td></tr></table>";
    echo "</div>";












}?>