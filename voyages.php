




<?php include'BDD/connexion-bdd.php';?>



<!DOCTYPE html>
<html lang="fr">
<?php include'layout/head.php'?>
<title>Locasun | Votre agence de voyage</title>
    <body>
        <?php include'layout/topbar.php'?>
        <?php include'layout/header.php'?>
        <?php include'landing/breadcrumb.php'?>
  
        <section class="section">
    <div class="container">
        <div class="row">
           
           <?php 
    
  
$result = $pdo->query("SELECT * FROM agence ");
    

    
    while($listeArticle = $result->fetch(PDO::FETCH_ASSOC)){ 
    ?>
           
           
            <div class="col-xl-4 text-center">

                <article class="card">
                <header class="card__thumb">
                    <img src="<?php echo $listeArticle["gallery"]; ?>" width="100%">
                    
                </header>
                <div class="card__date">
                    <span class="card__date__day"><?php echo $listeArticle["members"]; ?></span>
                    
                    <span class="card__date__month"><i class="fas fa-user-friends"></i></span>
                    
                </div>  
                <div class="card__body">
                    
                    <div class="card__category"><a href="#">Photos</a></div>
                    
                    <div class="card__title"><a href="produit.php?id=<?php echo $listeArticle['id']; ?>"><?php echo $listeArticle["title"]; ?></a></div>
                    
                    <div class="card__subtitle"><?php echo $listeArticle["destination"]; ?></div>
                     
                    <p class="card__description"><?php echo substr($listeArticle["article"], 0, 250); ?>...  </p>
                    
                     
                </div>  
                   
                  
                    
                    <footer class="card__footer">
                        
                        <span class="icon icon--time"><i class="fas fa-comments"></i></span>6 min
                        
                        <span class="icon icon--comment"><i class="fas fa-comments"></i></span><a href="#">39 comments</a>
                    </footer>
        
                </article>
            </div>
          <?php } ?>
 
        </div>
    </div>
</section>        




       
         <?php include'layout/footer.php'?> 
         <?php include'layout/script.php'?> 
    </body>
</html>