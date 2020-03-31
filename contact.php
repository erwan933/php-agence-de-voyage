<?php include'BDD/connexion-bdd.php'?>       
         
<!DOCTYPE html>
<html lang="fr">
<?php include'head.php'?>
<title>Locasun | Votre agence de voyage</title>
    <body>
        <?php include'topbar.php'?>
        <?php include'header.php'?>
        <?php include'landing/breadcrumb.php'?>
        

   
      <section class="section1" style="background:#f4f4f4;">
      <div class="container">
             <div class="row">
                <div class="col-md-4">
                     
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2618.2804654710258!2d2.2294962159287284!3d48.98621987930037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6671b32b23a73%3A0x829612437f3f50e5!2sLocasun!5e0!3m2!1sfr!2sfr!4v1585641733437!5m2!1sfr!2sfr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                     
                 </div>
                 <div class="col-md-8">
                      <form action="" method="post">
                   <div class="row">
                         <div class="col-md-6">
                              <label for="prenom"  >Prénom : *</label>
                              <input type="text" placeholder="Eddy" name="prenom" style="border:2px solid #fff;width:100%; padding:10px;background:#fff;">
                          </div>
                          <div class="col-md-6"> 
                              <label for="nom" name="nom">Nom : *</label>
                              <input type="text" placeholder=" MOLIA" name="nom" style="border:2px solid #fff;width:100%; padding:10px;background:#fff;">
                           </div>
                     </div> 
                         
                  <br> 
                          <div class="row">
                          
                          <div class="col-md-4">
                              <label for="phone">Téléphone :</label>
                              <input type="text" placeholder="06 00 00 00 00" name="phone" style="border:2px solid #fff;width:100%; padding:10px; background:#fff;">
                          </div> 
                           <div class="col-md-8">
                                <label for="email">Email : *</label>
                                <input type="text" placeholder="contact@exemple.com" name="email"  style="border:2px solid #fff;width:100%; padding:10px;background:#fff;"> 
                           </div>  
                          </div> 
                          <br>
                          <div class="row">
                           <div class="col-md-12">
                                <label for="sujet">Sujet : *</label>
                                <input type="text" placeholder="Demande d'information" name="sujet"  style="border:2px solid #fff;width:100%; padding:10px;background:#fff;"> 
                           </div>  
                          </div> 
                          <br>
                          <div class="row">
                           <div class="col-md-12">
                                <label for="message">Message : *</label>
                               <textarea name="message" rows="5" cols="33" placeholder="Bonjour, je vous contacte car j'aurais besoin de..." style="border:2px solid #fff;width:100%; padding:10px;background:#fff;"></textarea>
                                
                           </div>
                          <div class="text-center">
                              <input type="submit" value="Envoyer le formulaire" class="button-style-3">
                          </div>
                          </div>       
                 </form>
                 </div>
                 
             </div>
           </div>
           </section>
      
      
      
       
         <?php include'footer.php'?> 
         <?php include'script.php'?> 
    </body>
</html>