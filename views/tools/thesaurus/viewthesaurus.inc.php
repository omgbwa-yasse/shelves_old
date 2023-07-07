<?php
require_once 'models/tools/thesaurus/thesaurus.class.php';

function displayTerm($term, $level, $thesaurus) {
    ?>
    <div style="margin-left: <?= $level ?>px;">
    <hr>
        <div>Titre : <b><?= $term['term_title'] ?></b></div>
        <hr>
        <div>cote : <?= $term['term_cote'] ?></div>
        <div>Note d'application du terme : <?= $term['term_scope_note'] ?></div>
        <div>Enregistrement associer : 
            <?php
            $recordsAssociated=$thesaurus->SelectRecordIdAssociated($term['term_id']);
            foreach ($recordsAssociated as $record){
                ?>
                  <a href="index.php?q=repository&categ=search&sub=display&id=<?=$record['record_id']?>"><?=$record['record_title']?></a>
                <?php
            }
            
            ?>
        </div>

    </div>
    <?php
    $allchildterm = $thesaurus->childterm($term['term_id']);
    foreach ($allchildterm as $childterm) {
        displayTerm($childterm, $level + 50, $thesaurus);
    }
    
}

$thesaurus = new Thesaurus;
$allmainterm = $thesaurus->allmainterm();
foreach ($allmainterm as $mainterm) {
    ?>
    <hr>
    <?php
    displayTerm($mainterm, 0, $thesaurus);
}
?>