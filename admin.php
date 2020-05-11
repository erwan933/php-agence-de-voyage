<?php include'BDD/connexion-bdd.php';




 if(!empty($_POST["nom"])) {
    $result = $pdo->prepare("INSERT INTO inscription (nom, prenom, email, tel,mdp, mdp2) VALUES (:nom, :prenom, :email, :tel, :mdp, :mdp2)");
        $result->execute(array(
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'tel' => $_POST['tel'],
            'mdp' => $_POST['mdp'],
            'mdp2' => $_POST['mdp2'],
           
            

        ));
         
    }



   ?>
   
   
<!DOCTYPE html>
<html lang="fr">
<?php include'layout/head.php'?>
<title>Locasun | Votre agence de voyage</title>
    <body>
        <?php include'layout/topbar.php'?>
        <?php include'layout/header.php'?>
        
        
 <section class="section1"  id="sun-bg">
                <div class="container">
                    <div class="container text-center">
            <h2> Inscrivez-vous à LocaSun</h2>
            <span>Déposez une annonce avec votre agence de voyage Locasun</span>
            <hr>
        </div>
                     <div class="row">
                       <div class="col-xl-2"></div>
                        <div class="col-xl-8 inscriptions align-center">
                     
                               <form action="" method="post">
                                       
                                            
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                             <div class="col-md-5 ">
                                                  <label for="nom"  >Nom : *</label>
                                                  <input type="text" placeholder="BRIDOU" name="nom" class="formulaire" >
                                              </div>
                                              <div class="col-md-5"> 
                                                  <label for="prenom" name="prenom">Prénom : *</label>
                                                  <input type="text" placeholder="Justin" name="prenom" class="formulaire">
                                               </div>
                                               <div class="col-md-1"></div>
                                         </div><br>
                                         <div class="row">
                                              <div class="col-md-1"></div>
                                               <div class="col-md-10">
                                                   <label for="email">Email : *</label>
                                                    <input type="email" placeholder="contact@exemple.com" name="email"  class="formulaire">

                                               </div>
                                               <div class="col-md-1"></div>
                                              
                                          </div> 
                                              <br>
                                          <div class="row">
                                              <div class="col-md-1"></div>
                                               <div class="col-md-10">
                                                    <label for="tel">Téléphone : * </label>
                                                    <input type="tel" placeholder="0680450784" name="tel" style="border:2px solid #fff;width:100%; padding:10px; background:#fff;" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}">
                                               </div>
                                               <div class="col-md-1"></div>
                                              
                                          </div>  
                                     <br> 
                                         <div class="row">
                                             <div class="col-md-1"></div>
                                              <div class="col-md-10">
                                                  <label for="mdp">Mot de passe :</label>
                                                  <input type="text" name="mdp" class="formulaire" >
                                              </div> 
                                                 
                                          </div>
                                            <div class="col-md-1"></div>
                                             <br>
                                          <div class="row">
                                             <div class="col-md-1"></div>
                                              <div class="col-md-10">
                                                    <label for="mdp2">Confirmer le mot de passe : *</label>
                                                    <input type="text"  name="mdp2"  class="formulaire"> 
                                                    <br><br>
                                                    <p>Déjà membres de Locasun ? <a href="">Connectez-vous</a></p>
                                               </div>
                                                <div class="col-md-1"></div>
                                                 
                                          </div> 
                                      
                                          
                            
                                          
                                              <div class="text-center">
                                                  <input type="submit" value="Envoyer le formulaire" class="button-style-3">
                                              </div>
                                                 
                             </form>
        
                        </div>

                   </div>
                   <div class="col-xl-2"></div>
                </div>
            </section>
         <?php include'layout/footer.php'?> 
         <?php include'layout/script.php'?> 
    </body>
</html>