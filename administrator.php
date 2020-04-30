<?php include'BDD/connexion-bdd.php'




?> 
<!DOCTYPE html>
<html lang="fr" xmlns:og="http://ogp.me/ns#" id="top">
<?php include'layout/head.php'?>
<title>Locasun | Votre agence de voyage</title>
    <body>
        <?php include'layout/topbar.php'?>
        <?php include'layout/header.php'?>
        <?php include'landing/banner.php'?>
        
        <div class="container">
            <?php 
            
            $req = $pdo->query('SELECT * FROM users');

            $users = $req->fetch();

            
            
            ?>
        </div>
        
        
        
        <?php include'layout/footer.php'?>
        <?php include'layout/script.php'?>
        <?php include'js/popup.php'?>
       
        
        <a class="scroll-to-top hidden-mobile visible" href="#"><i class="fas fa-arrow-up "></i></a>
        
        
    </body>
</html>