<?php include'BDD/connexion-bdd.php';?>
   
   
<!DOCTYPE html>
<html lang="fr">
<?php include'layout/head.php'?>
<title>Locasun | Votre agence de voyage</title>
    <body>
        <?php include'layout/topbar.php'?>
        <?php include'layout/header.php'?>
        
        
 <section class="section2"  id="sun-bg">
                <div class="container">
                    <div class="container text-center">
            <h2> Inscrivez-vous à LocaSun</h2>
            <span>Déposez une annonce avec votre agence de voyage Locasun</span>
            <hr>
        </div>
                     <div class="row">
                       <div class="col-xl-2"></div>
                        <div class="col-xl-8 inscriptions align-center">
                     
                               <?php include'inscriptions.php'?>
        
                        </div>

                   </div>
                   <div class="col-xl-2"></div>
                </div>
            </section>
         <?php include'layout/footer.php'?> 
         <?php include'layout/script.php'?>
         <?php include'js/popup.php'?> 
    </body>
</html>