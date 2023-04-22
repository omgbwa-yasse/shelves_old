<?php
include_once 'models/repository/keyword.class.php';
include_once 'models/repository/records.class.php';
include_once 'models/repository/recordsManager.class.php';


$allrecords = new recordsManager();
$idrecords = $allrecords -> getAllrecordsId();
echo "<div style=\"margin-left:100px;\" >";
foreach($idrecords as $Idrecord){
    $record = new records ;
    $record -> setRecordId($Idrecord['id_records']);
    $record -> getRecordById();

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
    } 
    echo "</td></table>";

    echo "<br/><a href=\"index.php?q=repository&categ=create&sub=delete&id=". $record->getRecordId() ." \">Supprimer</a>";
    echo '<hr/>';
}
    echo "<div/>";
?>



