<?php
require_once 'models/tools/archiving_Charter/AchivingCharter.class.php';

$Charter = new ArchivingCharter();
$mainClassOFCharter = $Charter->allMainClasses();
?>

<table border='1'>
    <thead style="background-color: rgb(122, 90, 21); color: #ffffff;">
        <th>Mission</th>
        <th>Fonction</th>
        <th>Activité</th>
        <th>Intitulé</th>
        <th>Classe d'access</th>
        <th>Communicabilité</th>
        <th>Durée de conservation</th>
        <th>Sort Final </th>
        <th>Observation</th>
    </thead>
    <?php
    foreach ($mainClassOFCharter as $Class) {
    ?>
        <tr>
            <td colspan=9 style="background-color: rgb(201, 184, 147);"><?= $Class['classification_code'] ?></td>
        </tr>
        <?php
        $childLv1 = $Charter->ClassesChildBycode($Class['classification_code']);
        foreach ($childLv1 as $classChildLv1) {
        ?>
            <tr>
                <td></td>
                <td colspan=8 style="background-color: rgb(184, 184, 184);"><?= $classChildLv1['id'] ?></td>
            </tr>
            <?php
            $childLv2 = $Charter->makeCharterChild($classChildLv1['id']);
            foreach ($childLv2 as $classChildLv2) {
            ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= $classChildLv2['classification_code'] ?></td>
                    <td><?= $classChildLv2['classification_title'] ?></td>
                    <td><?= $classChildLv2['access_classe_code'] ?></td>
                    <td><?= $classChildLv2['communicability_title'] ?></td>
                    <td><?= $classChildLv2['retention_duration'] ?></td>
                    <td><?= $classChildLv2['retention_sort'] ?></td>
                    <td><?= $classChildLv2['classification_observation'] ?></td>
                </tr>
            <?php
            }
        }
    }
    ?>
</table>

