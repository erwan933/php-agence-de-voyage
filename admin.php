<?php include'BDD/connexion-bdd.php';



 

if($_POST) {
 $result = $pdo->exec("INSERT INTO agence (title, destination, members, article, activity, equipment, gallery, price) VALUES
 ('$_POST[title]', '$_POST[destination]','$_POST[members]','$_POST[article]','$_POST[activity]','$_POST[equipment]','$_POST[gallery]','$_POST[price]'  )");
}


   ?>
   
   
<!DOCTYPE html>
<html lang="fr">
<?php include'layout/head.php'?>
<title>Locasun | Votre agence de voyage</title>
    <body>
        <?php include'layout/topbar.php'?>
        <?php include'layout/header.php'?>
        <?php include'landing/breadcrumb.php'?>
        
 <section class="section1" style="background:#f4f4f4;">
                <div class="container">
                     <div class="row">
                        
                     
                               <form action="" method="post">
                                       <div class="row">
                                             <div class="col-md-6">
                                                  <label for="title"  >Titre de l'annonce: *</label>
                                                  <input type="text" placeholder="Hôtel Marmara" name="title" class="formulaire" style="border:2px solid #fff;width:100%; padding:10px;background:#fff; " >
                                              </div>
                                              <div class="col-md-6"> 
                                                  <label for="destination" name="nom">Destination : *</label>
                                                  <input type="text" placeholder="Paris, FRANCE" name="destination" style="border:2px solid #fff;width:100%; padding:10px;background:#fff;">
                                               </div>
                                         </div>
                                         <div class="row">
                                               <div class="col-md-12">
                                                    <label for="members">Nombre de personnes : *</label>
                                                   <input type="number" placeholder="5" name="members" style="border:2px solid #fff;width:100%; padding:10px;background:#fff;">

                                               </div>
                                              
                                          </div> 
                                              <br>
                                          <div class="row">
                                               <div class="col-md-12">
                                                    <label for="members">Description * <sub>(maxi 200 carracteres)</sub> </label>
                                                   
                                                    <textarea name="article" rows="5" style="border:2px solid #fff;width:100%; padding:10px;background:#fff;"></textarea>
                                               </div>
                                              
                                          </div>  
                                     <br> 
                                         <div class="row">
                                              <div class="col-md-4">
                                                  <label for="activity">Activités :</label>
                                                  <input type="text" placeholder="Jet Ski, Quad,..." name="activity" style="border:2px solid #fff;width:100%; padding:10px; background:#fff;" >
                                              </div> 
                                               <div class="col-md-8">
                                                    <label for="equipement">Equipements : *</label>
                                                    <input type="text" placeholder="TV, WiFi,..." name="equipment"  style="border:2px solid #fff;width:100%; padding:10px;background:#fff;"> 
                                               </div>  
                                          </div> 
                                      <br>
                                          <div class="row">
                                               <div class="col-md-12">
                                                    <label for="gallery">Image : *</label>
                                                    <input type="text" placeholder="https://..." name="gallery"  style="border:2px solid #fff;width:100%; padding:10px;background:#fff;"> 
                                               </div>  
                                          </div> 
                                      <br>
                                          <div class="row">
                                               <div class="col-md-12">
                                                    <label for="price">Prix : *</label>
                                                   <input type="number" placeholder="1000" name="price"  style="border:2px solid #fff;width:100%; padding:10px;background:#fff;"> 

                                               </div>
                                              <div class="text-center">
                                                  <input type="submit" value="Envoyer le formulaire" class="button-style-3">
                                              </div>
                                          </div>       
                             </form>
        
                        </div>

                   
                </div>
            </section>
         <?php include'layout/footer.php'?> 
         <?php include'layout/script.php'?> 
    </body>
</html>