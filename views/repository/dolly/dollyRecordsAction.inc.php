<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';
require_once 'models/dolly/dollyRecordManager.class.php';
require_once 'models/tools/organization/organization.class.php';
require_once 'models/tools/organization/organizationManager.class.php';
require_once 'models/repository/record.class.php';

switch($_GET['sub'])
{
    case 'updateClasse':
    case 'updateOrganization': 
    case 'updateContainer': 
    case 'updateStatus': 
    case 'updateSupport': 
    case 'updateParentRecord': 
    case 'exportRecords':
    case 'printRecords':
    case 'deleteRecords':  
    case 'tranfer': 
    case 'tranfered': isset($_POST['to'])? dollyAction($_GET['sub'], $_GET['id'], $_POST['to']):dollyAction($_GET['sub'], $_GET['id']) ;
    break;
    case 'updateObservation': dollyAction($_GET['sub'], $_GET['id']) ;
    break;
}




function dollyAction(string $action,int $currentDollyId, int $nextDollyId = NULL){

    if($action == 'updateObservation'){
        if(empty($_POST['observation'])){
            echo "vide";
            echo "<form method=\"POST\" action=\"index.php?q=repository&categ=dolly&sub=updateObservation&id=1&status=saved\">";
            echo "<input type=\"text\" name=\"observation\" value=\"observation\"><br/>";
            echo "<input type=\"submit\" value=\"envoyer\">";
            echo "</form>";
           }
        else if(isset($_GET['status']) && $_GET['status'] =  'saved')
           {
            echo $_POST['observation'];
            $list = new dollyRecordManager();
            $list = $list -> getAllRecordsByDolly($currentDollyId);
            echo var_dump($list);
            foreach($list as $record){
                $dollyRecord = new dollyRecord();
                if($dollyRecord -> updateRecordObservation( $record['id'], $_POST['observtaion'])){
                    echo "Mise à jour effectuée ...";
                } else{
                    echo "Mise à jour échouée...";
                }
        }
    }


    if($action == 'deleteRecords')
    {
        echo "Action de chariot  la suppression...";
        $list = new dollyRecordManager();
        $list -> getAllRecordsByDolly($currentDollyId);
        $list -> fetchAll();
        foreach($list as $record){
            $dollyRecord = new dollyRecord();
            if($dollyRecord -> deleteRecord($record['id'])){
                echo "Mise à jour effectuée ...";
            } else{
                echo "Mise à jour échouée...";
            }
    }
    }



    if($action == 'tranfer'){
        if(isset($_GET['to'])){
                echo "Action de chariot  le transfer...";
                $list = new dollyRecordManager();
                $list -> getAllRecordsByDolly($currentDollyId);
                $list -> fetchAll();
                foreach($list as $id){
                    $dollyRecord = new dollyRecord();
                if($dollyRecord -> updateRecordDolly($id['id'], $nextDollyId)){
                    echo "Mise à jour effectuée ...";
                } else{
                    echo "Mise à jour échouée...";
                }
            }
        }else{

            $list = new dollyRecordManager();
            $list = $list -> getAllDollyRecord();
            echo "<form method=\"POST\" action=\"index.php?q=repository&categ=dolly&sub=".$action."&id=".$currentDollyId."\">";
            echo "<select name=\"to\">";
            foreach($list as $id)
            {
                $dolly = new dollyRecord();
                $dolly -> setDollyRecordId($id['dolly_id']);
                $dolly = $dolly->setDollyRecordById();
                echo "<option value=\"". $dolly->getDollyRecordId()." \">". $dolly->getDollyRecordTitle() ."<option/>";  
            }
            echo "</select><input type=\"submit\"></form>";
        }
    }



    if($action == 'printRecords'){
        echo "Action de chariot  le impression...";
        /* 
        je recupère la liste des documents du chariot
        Je lance la fonction qui imprime la liste des documents
        */
    }



    if($action == 'exportRecords'){
        echo "Action de chariot  le exportation...";
        /* 
        je recupère la liste des documents du chariot
        Je lance la fonction qui ecrit dans un fichier excel la liste des documents
        */
    }


/*      


Modification des classe      


*/
    if($action == 'updateClasse')
    {
        echo "Action de chariot  le modification de classe...";
        if(isset($nextDollyId) && $nextDollyId =! NULL)
        {
                echo "le mutation est en cours";
                echo "la classe à muter est ...". $nextDollyId;
                $list = new dollyRecordManager();
                $list -> getAllRecordsByDolly($currentDollyId);
                $list -> fetchAll();
                foreach($list as $id){
                    $dollyRecord = new dollyRecord();
                    if($dollyRecord -> updateRecordClass($id['id'], $nextDollyId)){
                        echo "Mise à jour effectuée ...";
                    } else{
                        echo "Mise à jour échouée...";
                    }
                }
        } 
        else
        {
            $list = new activityClassesManager();
            $list =  $list -> allClasses();
            echo "<form method=\"POST\" action=\"index.php?q=repository&categ=dolly&sub=".$action."&id=".$currentDollyId."\">";
            echo "<select name=\"to\">";
            foreach($list as $id)
            {
                $class = new activityClass();
                $class -> getClassById($id['class_id']);
                echo "<option value=\"". $class -> getClassId()." \">";
                echo $class -> getClassTitle();
                echo "</option>";
            }
            echo "</select><input type=\"submit\"></form>";
        }
    } 



/*      

Modification des organisations      

*/

    if($action == 'updateOrganization' && !empty($to)){
        if(isset($nextDollyId) && $nextDollyId =! NULL)
        {
                $list = new dollyRecordManager();
                $list -> getAllRecordsByDolly($currentDollyId);
                $list -> fetchAll();
                foreach($list as $id){
                    $dollyRecord = new dollyRecord();
                    if($dollyRecord -> updateRecordOrganization($currentDollyId, $to)){ 
                        echo "Mise à jour effectuée ...";
                    } else{
                        echo "Mise à jour échouée...";
                    };
                }
        } 
        else
        {
            $classes = new organizationManager();
            $classes =  $classes -> allClasses();
            echo "<form method=\"POST\" action=\"index.php?q=repository&categ=dolly&sub=".$action."&id=".$currentDollyId."\">";
            echo "<select name=\"to\">";
            foreach($classes as $id)
            {
                $class = new activityClass();
                $class -> setClassById($id['id']);
                echo "<option value=\"". $class->getClassId()." \">". $class->getClassCode(). " - ". $class->getClassTitle()."<option/>";  
            }
            echo "</select><input type=\"submit\"></form>";
        }
    }

/*      Modification des containers de boites    */

    if($action == 'updateContainer' && !empty($to)){
        echo "Action de chariot  la modification des containers...";
        /*
            Je change la boite avec avec Id passé dans élement
        */
    } else{
        /*
            J'ouvre le formulaire pour selection id de boite à charger 
            la valeur de element
        */
    }


/*      Modification des status      */

if($action == 'updateStatus' && !empty($to)){
        echo "Action de chariot  la modification des status...";
        /*
            Je change le status  avec avec Id passé dans élement
        */
    } else{
        /*
            J'ouvre le formulaire pour selection id status à charger 
            la valeur de element
        */
    }




    if($action == 'updateSupport' && !empty($to)){
        echo "Action de chariot  modofication des supports...";
        /*
            Je change du support  avec avec Id passé dans élement
        */
    } else{
        /*
            J'ouvre le formulaire pour selection id support à charger 
            la valeur de element
        */
    }




    if($action == 'updateParentRecord' && !empty($to)){
        echo "Action de chariot  des parents...";
        /*
            Je change le Parent  avec avec Id passé dans élement
        */
    } else{
        /*
            J'ouvre le formulaire pour selection parent à changer à charger 
            la valeur de element
        */
    }




}



}?>