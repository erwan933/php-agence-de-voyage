<div class="banner1" >
    <div class="container " >
 
        <div class="row">
            <div class="col-md-8 box">
               <div class="banner-one"> 
                   <h1><span id="h1">Votre agence de voyage</span></h1>
                </div>
                <div class="banner-one-2">

                     <?php 
                        $result = $pdo->query("SELECT * FROM agence ORDER BY id DESC LIMIT 1");
                        while($listeArticle = $result->fetch(PDO::FETCH_ASSOC)){ 
                     ?>
<div class="row">
                    <div class="col-xl-7 text-center">
                            <header class="card__thumb">
                                <img src="<?php echo $listeArticle["gallery"]; ?>" width="100%" alt="<?php echo $listeArticle["title"]; ?>" class="img-border-radius"> 
                            </header>
                            <div class="card__date" style="right:40px; top:25px;">
                                <span class="card__date__day"><?php echo $listeArticle["members"]; ?></span>
                                <span class="card__date__month"><i class="fas fa-user-friends"></i></span>
                            </div>
                            
                </div>
                        
               <div class="col-xl-5">
                  <article style="width:100%" >
                      
                          <a href="produit.php?id=<?php echo $listeArticle['id']; ?>" class="h2 bleu"><?php echo $listeArticle["title"]; ?></a>
                      
                      <div class=""><?php echo $listeArticle["destination"]; ?></div>
                      <span class="price font-primary text-4"><strong class="text-color-dark"><?php echo $listeArticle["price"]; ?>€</strong> <s>1500€</s></span>
                      
                      <br><br>
										<i class="fas fa-check-circle text-color-dark mr-2"></i> <?php echo $listeArticle["equipment"]; ?><br>
										<i class="fas fa-check-circle text-color-dark mr-2"></i> <?php echo $listeArticle["activity"]; ?><br>
                        <br>
										
                       
                       
                   </article>
                   						

               </div>    
</div>
              <?php } ?>                    
            </div>
        </div>
        
        </div>
    </div>
   
</div>




