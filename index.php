
<?php include_once 'template/template.php';
 ?>

<!DOCTYPE html>
<head>
     <link rel="stylesheet" href="../template/css/style.css">
</head>
<body>
        
<section class="main">

<div class="sous-menu">

<?php 

if(isset($q)){
    switch($q){
        case "repertoire" : include '../shelves/views/repertoire.views.php';
        break;
        case "versement" : include '../shelves/views/versement.views.php';
        break;
        case "demande" : include '../shelves/views/demande.views.php';
        break;
        case "deposit" : include '../shelves/views/deposit.views.php';
        break;
        case "dolly" : include '../shelves/views/dolly.views.php';
        break;
        case "outilsGestion" : include '../shelves/views/outilsGestion.views.php';
        break;
        case "parametre" : include '../shelves/views/parametre.views.php';
        break;
    }
}

?></div>
<div class="container">

</div>
        </section>
</body>