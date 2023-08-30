<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';
require_once 'models/dolly/dollyRecordManager.class.php';
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
    case 'updateObservation': isset($_POST['observation'])? dollyAction($_GET['sub'], $_GET['id'], NULL, $_POST['observation']):dollyAction($_GET['sub'], $_GET['id']) ;
    break;
}

function dollyAction(string $action,int $dollyId, int $to = NULL, string $comment = NULL){
    if($action == 'deleteRecords')
    {
        /*
        1- je recupère les ID dans dolly
        2- je lance la suppression dans un foreach
        3- return "Documents supprimer avec succès."
        */
    }
    if($action == 'tranfer'){
        /*
        renvoie un formulaire qui montre le panier d'arriver
        */
    }
    if($action == 'tranfered' && !empty($to) ){
        /*
        j'envoie les documents du panier X vers Y
        Je supprime après chaque transfert la ligne sur le X
        */
    }
    if($action == 'printRecords'){
        /* 
        je recupère la liste des documents du chariot
        Je lance la fonction qui imprime la liste des documents
        */
    }
    if($action == 'exportRecords'){
        /* 
        je recupère la liste des documents du chariot
        Je lance la fonction qui ecrit dans un fichier excel la liste des documents
        */
    }
    if($action == 'updateObservation'){
        if(isset($_POST['to']) && $_POST['to'] =! NULL){
            /* la modification */
        }
    } else{

        echo "<form method=\"POST\" action=\"index.php?q=repository&categ=dolly&sub=".$action."&id=".$dollyId."\">";
        echo "<textarea value=\"1\" rows=\"30\" cols=\"10\">";
        echo "</select><input type=\"submit\"></form>";
    }

    if($action == 'updateClasse')
    {
        if(isset($_POST['to']) && $_POST['to'] =! NULL)
        {
                echo "le mutation est en cours";
                echo "la classe à muter est ..." . $_POST['to'];
                $list = new dollyRecordManager();
                $list -> getAllRecordsByDolly($_GET['id']);
                $list -> fetchAll();
                foreach($list as $id){
                    $dollyRecord = new recordRecord();
                    if($dollyRecord -> updateRecordClass($id['id'], $_POST['to'])){
                        echo "Mise à jour effectuée ...";
                    } else{
                        echo "Mise à jour échouée...";
                    };
                }
        } 
        else
        {
            $classes = new activityClassesManager();
            $classes =  $classes -> allClasses();
            echo "<form method=\"POST\" action=\"index.php?q=repository&categ=dolly&sub=".$action."&id=".$dollyId."\">";
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

    if($action == 'updateOrganization' && !empty($to)){
        /*
            Je change la classe avec avec Id passé dans élement
        */
    } else{
        /*
            J'ouvre le formulaire pour selection id de classe à charger 
            la valeur de element
        */
    }

    if($action == 'updateContainer' && !empty($to)){
        /*
            Je change la boite avec avec Id passé dans élement
        */
    } else{
        /*
            J'ouvre le formulaire pour selection id de boite à charger 
            la valeur de element
        */
    }

    if($action == 'updateStatus' && !empty($to)){
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

?>