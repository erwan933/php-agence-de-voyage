<?php include'../BDD/connexion-bdd.php'?> 
<!DOCTYPE html>
<html lang="fr">
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
        <title>Locasun | Connexion </title>
    </head>
<title>Locasun | Votre agence de voyage</title>
<body>
	
	<header>
       
          <div class="container">
                <div class="topnav" id="myTopnav">
                     <div class="row">
                         <div class="col-md-1 ">
                              <a href="../index.php" class="logo" title="logo"><img src="../img/logo2.png" alt="Logo Locasun" width="90rem"></a>
                         </div>   
                         <div class="col-md-4"></div>     
                         <div class="col-md-7">
                             <div class="right">
                                  <a href="../voyages.php" class="active menu-padding" id="hover" title="Voyages">NOS VOYAGES</a>
                                  <a href="index.php" class=" menu-padding" title="Annonce">Déposer une annonce</a>
                                  <a href="../contact.php" class=" menu-padding" title="Page Contact">Contact</a>
                             </div>
                         </div>
                    </div>
                 </div>
            </div>
        <div class="topnav-mobile" id="myTopnavMobile">
             <div class="right-mobile">
                 <a href="../index.php" class="menu-padding" title="Accueil">Accueil</a>
                 <a href="../voyages.php" class=" active menu-padding" title="Voyages">Nos voyages</a>
                 <a href="index.php" class=" menu-padding" title="Annonce">Déposer une annonce</a>
                 <a href="../contact.php" class=" menu-padding" title="Contact">Contact</a>
                 <a href="javascript:void(0);" class="icon" onclick="myFunction()" title="JS">
                      <i class="fa fa-bars"></i>
                 </a>
              </div>
        </div>
 </header>
    
   
    
   
      
      
     <!-- RECUPERER 1 ARTICLE--> 
   <?php 
    

 
$result = $pdo->query("SELECT * FROM agence");
$listeArticle = $result->fetch(PDO::FETCH_ASSOC);

    $query =  $pdo->prepare('SELECT * FROM agence WHERE id = :id');
    $query->execute(array(
 'id' => $_GET['id']
 ));
    
    
    while($listeArticle = $query->fetch(PDO::FETCH_ASSOC)){ ?>

 
 
 
 <section class="section">
              <div role="main" class="main">
				<div class="container">
					<div class="row mb-5">
						<div class="col-md-5 mb-5 mb-md-0">
							<div >
                                <span class="d-block card__thumb">
                                    <img alt="Product Image" src=" <?php echo $listeArticle["gallery"]; ?>" class="img-fluid">
                                </span>
                            </div>
                            <div class="lieu">
								<?php echo $listeArticle["destination"]; ?>
							</div>
							<div class="row text-center p-t10">
								<div class="col-md-4 "><a href="#" title="Image"><img src="<?php echo $listeArticle["gallery"]; ?>" class="w100"></a></div>
								<div class="col-md-4 "><img src="<?php echo $listeArticle["gallery"]; ?>" class="w100"></div>
								<div class="col-md-4 100"><img src="<?php echo $listeArticle["gallery"]; ?>" class="w100"></div>
							</div>
						</div>
						<div class="col-md-7">
							<h2 class="line-height-1 font-weight-bold mb-2"><?php echo $listeArticle["title"]; ?></h2>
							<div class="product-info-rate d-flex mb-3">
								<i class="fas fa-star text-color-default mr-1"></i>
								<i class="fas fa-star text-color-default mr-1"></i>
								<i class="fas fa-star text-color-default mr-1"></i>
								<i class="fas fa-star text-color-default mr-1"></i>
								<i class="fas fa-star text-color-default"></i>									
							</div>
							<span class="price font-primary text-4"><strong class="text-color-dark"><?php echo $listeArticle["price"]; ?>€</strong></span>
							
							<p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex.</p>
							<hr class="my-4">
							<ul class="list list-unstyled text-color-light-3 pl-5">
                                        <li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> Capacité maximale : <?php echo $listeArticle["members"]; ?> personnes</li>
										<li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> <?php echo $listeArticle["equipment"]; ?></li>
										<li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> <?php echo $listeArticle["activity"]; ?> </li>
										
									</ul>
						<!--	<hr class="my-4">
							
							 <div class="d-flex align-items-center">
								<span class="text-2">Réseaux Sociaux :</span>
								<ul class="social-icons social-icons-dark social-icons-1 ml-3">
									<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
									<li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<div class="row">
						<div class="col">
							<ul class="nav nav-tabs nav-tabs-default" id="productDetailTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-bold active" id="productDetailDescTab" data-toggle="tab" href="#productDetailDesc" role="tab" aria-controls="productDetailDesc" aria-expanded="true" title="Description">DESCRIPTION</a>
								</li>
							</ul>
							<div class="tab-content" id="contentTabProductDetail">
								<div class="tab-pane fade pt-4 pb-4 show active" id="productDetailDesc" role="tabpanel" aria-labelledby="productDetailDescTab">
									<p class="text-color-light-3"><?php echo $listeArticle["article"]; ?></p>
									
									
								</div>
								
								
							</div>
						</div>
					</div>

				</div>
			
				
 			</div>
 			
 		</section>
 

 
<?php } ?>
   
   
       
    
    
    <?php include'../layout/footer.php'?>
    <?php include'../layout/script.php'?>
    <?php include'../js/popup.php'?>
    
</body>
</html>