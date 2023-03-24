<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/bootstrap.min.css" >
    <link rel="stylesheet" href="template/css/bootstrap.css" >
    <title><?= $titre ?></title>
</head>
<body>
<script src="template/js/bootstrap.bundle.min.js"></script>
<script src="template/js/popper.min.js"></script>
<script src="template/js/bootstrap.min.js"></script>  

<nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Repertoire</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="accueil" aria-current="page">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Records">Records</a>
                </li>
            </ul>
            
        </div>
  </div>
</nav>
<div class="containner">
    <h1 class ="rounded border border-dark p-2 m-2 text-center text-white bg-info"><?= $titre ?></h1>
    <?= $content ?>
</div>



    
</body>
</html>