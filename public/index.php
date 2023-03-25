<?php
include('template/common/topbar.php');
include ('../controller/config.php');
$stmt = $conn->query('SELECT * FROM records');
$con = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="main">
    <?php 
       include('template/common/menu.php');
    ?>
    
    <div class="container">
       <h1>Recherche</h1>
       <div class="spec"><a href="">Dernier enregistrement</a><a href="">Par producteur</a>
       <br><a href="">Par mots cle</a><a href="">Par classe</a></div> 
        <?php foreach($con as $con): ?>
      <div class="result">
      <h4><?=$con['records_title']?></h4>
      <p><?=$con['records_observation']?>; <?=$con['records_date_start']?>, - <?=$con['records_date_end']?> <br>
 <br>
      </p>
    </div>
      <?php endforeach; ?>
    
   </div> 
  
</section>

</body>
</html>