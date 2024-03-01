
<div style="overflow: auto;">
<div style="float: left; ">
    <b  style="display:left; font-size:40px; color:#1e6565;">My Shelves</b> 
</div>
<div style="float: left;  margin-left:30px;">
    <form method="POST" action="index.php?q=repository&categ=search&sub=words">
        <input type="text" name="text" style="width:400px;height:25px;border:solid 2px grey; border-radius:7px" />
        <input class="btn" type="submit" value="Rechercher" style="width:90px;height:30px; border-radius:7px" />
        <?php  require_once "models/user/user.class.php";  $user = new user();  $user -> hydrateByPseudo($_COOKIE['pseudo']);?>
    </form>
</div> 
<a href="index.php?q=session&categ=user&sub=deconnexion">Deconnexion</a>
</div>
</div>