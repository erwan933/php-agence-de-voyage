<?php session_start() ?>

    <?php
    
    if (!$_SESSION['admin']){
        
        header('location:login.php');
    }

function RandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 16; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1 )];
        }
        return $randstring;
    }
   
$key = RandomString();
    $_SESSION["keyMain"]=$key;

if(isset($_GET['logout'], $_GET['key']) && !empty($_GET['key'])) {
        session_destroy();
        header('location: login.php');
        exit();
    }
?> 
<?php include'../BDD/connexion-bdd.php';

    // Requêtes SQL pour récupérer toutes les lignes d'une table de la base de données
    $result = $pdo->query("SELECT * FROM agence");
    
    if(isset($_GET["delete"])) {
  // Requêtes SQL qui supprime une ligne en base en lui passant l'id de l'article
  $result = $pdo->prepare('DELETE FROM agence WHERE id = :id');
  // On execute la requête en précisant que l'ID est celui passé en URL
  $result->execute(array(
      'id' => $_GET["delete"]
  ));
              
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
         
    }  
    




?> 
<!DOCTYPE html>
<html lang="fr" xmlns:og="http://ogp.me/ns#" id="top">
     <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/theme.css">
        <link rel="stylesheet" href="../css/theme-elements.css">
        <link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/dark.css">
        
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../img/favicon.png">
        <meta name="description" content="LocaSun est l'agence idéale pour l'organisation de vos voyages, faites confiance à LocaSun pour un voyage réussi">
        <meta property="og:title" content="LocaSun | Pour un voyage réussi" />
        <meta property="og:url" content="http://www.projet-php.topadev.com" />
        <meta property="og:image" content="http://www.projet-php.topadev.com/img/slide-1.jpg" />
        <link rel="stylesheet" href="../css/popup.css">   
        <script src="https://kit.fontawesome.com/c9bc4d46f8.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
        <title>Locasun | Admin </title>
    </head>

    <body>
       <?php require_once'../BDD/connexion-bdd.php'; ?>
      
       <section class="topbar">
           <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-4"></div>
               <div class="col-md-4">
                  <div class="row"> 
                         <?php 
    
    $result = $pdo->query("SELECT * FROM users ");

    while($listeArticle = $result->fetch(PDO::FETCH_ASSOC)){ 
        
        ?>
         
   <?php   } ?>
                      <div class="col-md-2 image-admin" > 
                           <img src="https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=660&q=80" alt="Photo Profil">
                       </div>
                         
                      <div class="col-md-10">
                          <p>Vous êtes connecté(e) <strong><?=$_SESSION['admin']?></strong></p>
                           <a href="?logout=true&key=$_SESSION['admin']" title="Déconnexion">Se deconnecter</a>
                       </div>
                  </div>   
               </div>
           </div>
        </section>
        
        <section class="body">
            <div class="container">
                <h2> Bienvenue <?= $_SESSION['admin']?> </h2>
            </div>
        </section>
        
        <section class="section1 bg-gris">
           <div class="container text-center">
                <h2> Déposez une annonce</h2>
                <span>Déposez une annonce avec votre agence de voyage Locasun</span>
                <hr>
            </div>
            <div class="container ">
                <div class="row">
                     <div class="formulaire__fond"> 
                          <form method="POST"><br>
                               <div class="row">
                                   <div class="col-xl-5">
                                        <label for="title"  >Titre de l'annonce: *</label>
                                        <input type="text" placeholder="Hôtel Marmara" name="title" class="formulaire" >
                                    </div>
                                    <div class="col-xl-4">
                                        <label for="destination" name="nom">Destination : *</label>
                                        <input type="text" placeholder="Paris, FRANCE" name="destination" class="formulaire">
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="members">Nombre de personnes : *</label>
                                        <input type="number" placeholder="5" name="members" class="formulaire" min="1" require>
                                    </div>
                                </div>
                                <br>
                                  <div class="row">
                                    <div class="col-xl-12">
                                        <label for="members">Description * <sub>(maxi 200 carracteres)</sub> </label>
                                        <textarea name="article" rows="5" class="formulaire"></textarea>
                                    </div>
                                  </div>
                                <br />
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label for="activity">Activités :</label>
                                        <input type="text" placeholder="Jet Ski, Quad,..." name="activity" class="formulaire" >
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="equipement">Equipements : *</label>
                                        <input type="text" placeholder="TV, WiFi,..." name="equipment"  class="formulaire">
                                    </div>
                                  </div>
                                <br />
                                <div class="row">
                                    <div class="col-xl-10">
                                        <label for="gallery">Image : *</label>
                                        <input type="text" placeholder="https://..." name="gallery"  class="formulaire">
                                    </div>
                                    <div class="col-xl-2">
                                        <label for="price">Prix : *</label>
                                        <input type="number" placeholder="1000" name="price"  class="formulaire" min="1" require>
                                    </div>
                                  </div>
                                <br />
                                <div class="text-center">
                                    <input type="submit" value="Envoyer le formulaire" class="button-style-3">
                                </div>
    <!-- <input type="submit" value="Envoyer" id="target">-->
    <!--<script>alert("<?php //echo htmlspecialchars('Votre article à bien été ajouté', ENT_QUOTES); ?>")</script>-->
    
                        </form>
                      </div>
                    <div class="row">
  
       <?php 
    
    $result = $pdo->query("SELECT * FROM agence ");

    while($listeArticle = $result->fetch(PDO::FETCH_ASSOC)){ 
        
        ?>
            <div class="col-xl-4 ">
                <article class="card">
                    <header class="card__thumb">
                        <img src="<?php echo $listeArticle["gallery"]; ?>" width="100%" alt="<?php echo $listeArticle["title"]; ?>">
                    </header>
                    <div class="card__date">
                        <span class="card__date__day"><?php echo $listeArticle["members"]; ?></span>
                        <span class="card__date__month"><i class="fas fa-user-friends"></i></span>
                    </div>  
                    <div class="card__body">
                        <div class="card__category"><a href="#" title="Photos">Photos</a></div>
                        <div class="card__title"><a href="produit.php?id=<?php echo $listeArticle['id']; ?>" title="Produits"><?php echo $listeArticle["title"]; ?></a></div>
                        <div class="card__subtitle"><?php echo $listeArticle["destination"]; ?></div>
                        <p class="card__description"><?php echo substr($listeArticle["article"], 0, 250); ?>...  </p>
                    </div>  
            
                        <footer class="card__footer">
                            <span class="icon icon--time"><a href="?delete=<?php echo $listeArticle["id"]; ?>." title="Supprimer"><i class="fas fa-trash-alt" style="color:#ff0000;"></i></a></span>Supprimer

                        </footer>
                    </article>
                </div>
    <?php   } ?>
            </div>
          </div>
      </div>
  </section>
		
		
  <footer>
   <section class="section1">
      <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="../img/logo2.png" alt="" width="150rem">
                    <p class="footer blanc"> Envie de nous confier votre projet ?</p>
                    <p>L’équipe <a href="/" class="orange" title="Locasun">LocaSun</a> est à votre écoute pour toute demande </p>
                        <br><br><br>
                    <a href="contact" class="button-style-1" title="Page Contact">Contactez-nous</a>
                        <br><br><br><br>
                </div>        
                <div class="col-md-1"></div>  
                <div class="col-md-5">         
                      <p style="font-weight:700"> CONTACT </p>  
                      <p class="orange">
                          <i class="fas fa-chevron-right">&nbsp;</i>
                          <span class="blanc">Téléphone :</span> 
                          <a href="#" class="orange" title="Téléphone">06 87 89 65 25</a>
                      </p>
                      <p class="orange">
                          <i class="fas fa-chevron-right">&nbsp;</i>
                          <span class="blanc">Mail :</span> 
                          <a href="#" class="orange" title="téléphone">contact@locasun.com</a>
                      </p>
                      <p class="orange">
                            <i class="fas fa-chevron-right">&nbsp;</i>
                            <span class="blanc">Adresse :</span>
                                <br>
                            84 Allée Gambetta <br>77000, Meaux 
                      </p>
                       <br>
                        <p class="orange">
                            <i class="fas fa-chevron-right">&nbsp;</i>
                            <span class="blanc">Suivez-nous sur les réseaux sociaux :</span>
                            <br>
                        </p>
                        <a href="#" class="sociaux" title="Réseaux sociaux">
                            <span>
                                <i class="fab fa-instagram"></i>
                            </span>
                        </a>    
                        <a href="#" class="sociaux" title="Réseaux sociaux">
                            <span>
                                <i class="fab fa-facebook"></i>
                            </span>
                        </a> 
                </div>
            </div>
      </div>
   </section> 
</footer>

<section id="copyright">
   <div class="container text-center">
       &copy; <?php echo date('Y');?> Copyright <a href="#">LocaSun</a> | Tous droits réservés - <a href="mentions-legales">Mentions Légales</a> - <a href="a-propos">A propos</a>
    </div>
</section>
        
        
        <?php include'../layout/script.php'?>
        <?php include'../js/popup.php'?>
       
        
        <a class="scroll-to-top hidden-mobile visible" href="#" title="STT"><i class="fas fa-arrow-up "></i></a>
        
        
    </body>
</html>

