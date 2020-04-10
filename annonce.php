<?php include'BDD/connexion-bdd.php';

    // Requêtes SQL pour récupérer toutes les lignes d'une table de la base de données
    $result = $pdo->query("SELECT * FROM agence");
    
    if(isset($_GET["delete"])) {
  // Requêtes SQL qui supprime une ligne en base en lui passant l'id de l'article
  $result = $pdo->prepare('DELETE FROM agence WHERE id = :id');
  // On execute la requête en précisant que l'ID est celui passé en URL
  $result->execute(array(
      'id' => $_GET["delete"]
  ));
         
        header('Location:annonce.php');
} 

    
 //$pdo = new PDO('mysql:host=localhost;dbname=blog; charset = utf8', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
 if(!empty($_POST["title"])) {
    $result = $pdo->prepare("INSERT INTO agence (title, destination, activity, equipment,gallery, article,price,members) VALUES (:title, :destination, :activity, :equipment, :gallery, :article, :price, :members)");
        $result->execute(array(
            'title' => $_POST['title'],
            'destination' => $_POST['destination'],
            'activity' => $_POST['activity'],
            'equipment' => $_POST['equipment'],
            'gallery' => $_POST['gallery'],
            'article' => $_POST['article'],
            'price' => $_POST['price'],
            'members' => $_POST['members'],
            

        ));
         header('Location:annonce.php');
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
        

<section class="section__dark">
        <div class="container text-center">
            <h2> Déposez une annonce</h2>
            <span>Déposez une annonce avec votre agence de voyage Locasun</span>
            <hr>
        </div>
</section>

   <section class="bg-gris">

        <div class="container ">
<div class="row">
 <div class="col-xl-3 formulaire__fond"> 
  
  <form method="POST"><br>
    <label for="title"  >Titre de l'annonce: *</label>
    <input type="text" placeholder="Hôtel Marmara" name="title" class="formulaire" >

    <label for="destination" name="nom">Destination : *</label>
    <input type="text" placeholder="Paris, FRANCE" name="destination" class="formulaire">

    <label for="members">Nombre de personnes : *</label>
    <input type="number" placeholder="5" name="members" class="formulaire" min="1" require>

    <br />
    
    <label for="members">Description * <sub>(maxi 200 carracteres)</sub> </label>
    <textarea name="article" rows="5" class="formulaire"></textarea>
    
    <br />
    
    <label for="activity">Activités :</label>
    <input type="text" placeholder="Jet Ski, Quad,..." name="activity" class="formulaire" >
    
    <br /><br />

    <label for="equipement">Equipements : *</label>
<input type="text" placeholder="TV, WiFi,..." name="equipment"  class="formulaire">

    <br />
    <label for="gallery">Image : *</label>
<input type="text" placeholder="https://..." name="gallery"  class="formulaire">
<br>
<label for="price">Prix : *</label>
<input type="number" placeholder="1000" name="price"  class="formulaire" min="1" require>

<div class="text-center">
    <input type="submit" value="Envoyer le formulaire" class="button-style-3">
</div>

   <!-- <input type="submit" value="Envoyer" id="target">-->
       
       
      <!--    <script>alert("<?php// echo htmlspecialchars('Votre article à bien été ajouté', ENT_QUOTES); ?>")</script>  -->
       
      
  </form>
  </div>
  <div class="col-md-9">
   <div class="row">
   <?php 
    
  
$result = $pdo->query("SELECT * FROM agence ");
    

    
    while($listeArticle = $result->fetch(PDO::FETCH_ASSOC)){ 
    ?>

<div class="col-xl-6 ">
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
                        
                        <span class="icon icon--time"><a href="?delete=<?php echo $listeArticle["id"]; ?>."><i class="fas fa-trash-alt" style="color:#ff0000;"></i></a></span>Supprimer
                        
                    </footer>
        
                </article>

</div>



<?php } ?></div></div>
</div>
  </div>



  </section>

       
         <?php include'layout/footer.php'?> 
         <?php include'layout/script.php'?> 
    </body>
</html>