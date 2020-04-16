<?php include'BDD/connexion-bdd.php'?> 
<!DOCTYPE html>
<html lang="fr" xmlns:og="http://ogp.me/ns#" id="top">
<?php include'layout/head.php'?>
<title>Locasun | Votre agence de voyage</title>
    <body>
        <?php include'layout/topbar.php'?>
        <?php include'layout/header.php'?>
        <?php include'landing/banner.php'?>


            
               <section class="section2">
                   <div class="container text-center">
                    <h2>Vous avez choisi la bonne agence</h2>
                    <div class="row">
                         <?php 
    
                                    
                                    $result = $pdo->query("SELECT * FROM agence LIMIT 2");
                                        

                                        
                                        while($listeArticle = $result->fetch(PDO::FETCH_ASSOC)){ 
                                        ?>
                                   
                                   
                                   
                                   
                                   
                                   
                                   <div class="col-xl-6 text-center">

                <article class="card " style="width:100%" >
                <header class="card__thumb">
                    <img src="<?php echo $listeArticle["gallery"]; ?>" width="100%">
                    
                </header>
                <div class="card__date">
                    <span class="card__date__day"><?php echo $listeArticle["members"]; ?></span>
                    
                    <span class="card__date__month"><i class="fas fa-user-friends"></i></span>
                    
                </div>  
                <div class="card__body__2">
                    
                    <div class="card__category"><a href="#">Photos</a></div>
                    
                    <div class="card__title"><a href="produit.php?id=<?php echo $listeArticle['id']; ?>"><?php echo $listeArticle["title"]; ?></a></div>
                    
                    <div class="card__subtitle"><?php echo $listeArticle["destination"]; ?></div>
                     
                    <p class="card__description"><?php echo substr($listeArticle["article"], 0, 250); ?>...  </p>
                    
                     
                </div>  
                </article>
            </div>
          <?php } ?>                    
                               
                       </div>
                   </div>      
            </section>

            

            <section class="section1">
               <div class="container">
                    <div class="row">
                        <div class="col-md-6">      
                                 <article class=" w100">
                                        <img src="img/particulier.jpg" alt="" class="w100 shadow1">
                                  </article>   
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 align-middle">

                            <table style="height: 290px;">
                              <tbody>
                                <tr>
                                  <td class="align-middle"><span class="h2">Votre location de vacance de particulier à particulier</span><br><br><p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem.</p>
                                      <div class="text-center">
                                        <a href="#" class="button-style-2" style="display:inline-block;">Nos destinations</a>
                                      </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section> 
            <section class="section2">
               <div class="container">
                    <div class="row">
                       <div class="col-md-5 align-middle">
                            <table style="height: 290px;">
                              <tbody>
                                <tr>
                                  <td class="align-middle"><span class="h2">Votre location de vacance de particulier à particulier</span><br><br><p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem.</p>
                                      <div class="text-center">
                                       <a href="#" class="button-style-2" style="display:inline-block;">Nos destinations</a>
                                      </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6">      
                                 <article class=" w100">
                                        <img src="img/particulier2.jpg" alt="" class="w100 shadow1">
                                  </article>   
                        </div>
                    </div>
                </div>
            </section>
           <section class="section1">
                <div class="container">
                    <h2>Choisissez votre idéal de vacances avec LocaSun</h2>
                        <br><br>
                    <div class="row text-center">
                     
                     <div class="col-md-3">
                         <article class=" w100">
                                <img src="img/mer.jpg" width="100%">
                                
                          </article>
                         <p class="max-width1rem">Vacances à la mer</p>
                     </div>
                     <div class="col-md-3">
                         <article class=" w100">
                                <img src="img/montagne.jpg" width="100%">
                          </article>
                          <p class="max-width1rem">Vacances à la montagne</p>
                     </div> 
                     <div class="col-md-3">
                         <article class=" w100">
                                <img src="img/campagne.jpg" width="100%">
                          </article>
                          <p class="max-width1rem">Vacances à la campagne</p>
                     </div>
                     <div class="col-md-3">
                         <article class=" w100">
                                <img src="img/archipels.jpg" width="100%">
                          </article>
                          <p class="max-width1rem">Archipels</p>
                     </div>
                     
                    </div>  
                     
                </div>
                  
            </section>
            <section class="section2">
               <div class="container">
                    <div class="row ">
                        <div class="col-xl-7">
                            <h2>Vous avez choisi la bonne agence</h2>
                            <span>Faites confiance à LocaSun pour le bon déroulement de vos voyages</span>
                        </div>
                        <a href="#" class="button-style-1" >Nos destinations</a>
                        <a href="#" class="button-style-2" >Contact</a>
                    </div>
                    
               </div>

            </section>
            
       
        
        <?php include'layout/footer.php'?>
        <?php include'layout/script.php'?>
        <?php include'js/popup.php'?>
       
        
        
        
        
    </body>
</html>