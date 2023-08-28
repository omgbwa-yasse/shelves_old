<?php
require_once 'models/tools/classification/classesManager.class.php';
require_once 'models/tools/classification/class.class.php';

switch($_GET['sub'])
{
    case 'updateClasse': dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'updateOrganization': dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'updateContainer': dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'updateStatus': dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'updateSupport': dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'updateParentRecord': dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'updateObservation': dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'exportRecords':dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'printRecords':dollyAction($_GET['sub'], $_GET['id']);
    break;
    case 'deleteRecords': dollyAction($_GET['sub'], $_GET['id']);
    break;  
    case 'tranfer': dollyAction($_GET['sub'], $_GET['id']) ;
    break;
    case 'tranfered':dollyAction($_GET['sub'], $_GET['id'], $_GET['to']) ;
    break;
}

function dollyAction(string $action,int $dollyId, int $to = NULL){
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
    if($action == 'updateObservation' && !empty($to)){
        /*
            Je change l'oberservation avec élement
        */
    } else{
        /*
            J'ouvre le formulaire pour charger la valeur de element
        */
    }
    if($action == 'updateClasse'){
        $classes = new activityClassesManager();
        $classes =  $classes -> allClasses();
        echo "<form method=\"GET\" action=\"index.php?q=repository&categ=dolly&sub=".$action."&id=".$dollyId."\">";
        echo "<select name=\"to\">";
        foreach($classes as $id){
            $class = new activityClass();
            $class -> setClassById($id['id']);
            echo "<option value=\"". $class->getClassId()." \">". $class->getClassCode(). " - ". $class->getClassTitle()."<option/>";  
        }
        echo "</select><input type=\"submit\"></form>";

    } else if($action == 'updateClasse' && isset($to) && !empty($to)){
        echo 'Hi 2.....';
       /*
            Je change la classe avec avec Id passé dans élement
        */
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