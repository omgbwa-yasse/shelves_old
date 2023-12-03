
    <form method="post" action="index.php?q=transfer&categ=create&sub=save">
        <table border="0">
        <tr><td>Reference : </td><td><input type="text" name="reference" placeholder="Numéro versement"/></td></tr>
        <tr><td>Intitulé :</td><td><input type="text" name="title" placeholder="Titre du versement"/></td></tr>
        <tr><td>Observation :</td><td><textarea name="observation" rows="20" cols="46" placeholder="Sommaire sur le versement"></textarea></td></tr>
        <tr><td>Detenteur :</td><td><select name="organization_id">
            <?php
                
                require_once "models/tools/organization/organizationManager.class.php";
                require_once "models/tools/organization/organization.class.php";

                $list = new organizationManager();
                $list = $list ->getAllOrganization();
                foreach($list as $id){
                    $organization = new organization();
                    $organization->setOrganizationById($id['id']);
                    echo "<option value=\"". $organization->getOrganizationId()  ."\">";
                    echo $organization->getOrganizationCode() . " - " . $organization->getOrganizationTitle();
                    echo "</option>";
                }
                
            ?>
        </select> </td></tr>
        <tr><td> Statut :</td><td>
        <select name="transfer_status_id">
        <?php
            require_once "models/transfer/transferStatus.class.php";
            $list = new transferManager();
            $list = $list->getAllTransferStatus();
            foreach($list as $statusId){
                $status = new TransferStatus();
                $status ->hydrateTransfertStatusById($statusId['id']);
                echo "<option value=\"". $status->getRecordTransferStatusId()  ."\">";
                echo $status->getRecordTransferStatusTile();
                echo "</option>";
            }
        ?>
        </select> </td></tr>
        <tr><td></td><td><input type="reset" name="annuler"> <input type="submit" name="envoyer"></td></tr> 
        </table>
    </form>
















