<?php session_start()?>
   
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
        <title>Locasun | Connexion </title>
    </head>

    <body>
       <?php require_once'../BDD/connexion-bdd.php'?>
     
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
                   
   <div class="breadcrumb-contact-admin" >
        <div class="text-center login-text h2">Connexion</div>  
   </div> 
            
  <section class="section2">
        <div class="container">
            <h2>Se connecter : </h2>
                <?php 
    
    
    

    if (isset($_POST) AND !empty($_POST)){
      
       if(!empty(htmlspecialchars($_POST['pseudo'])) AND !empty(htmlspecialchars($_POST['password']))){
            
           $req = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');

           $req->execute([
               
               'pseudo' => $_POST['pseudo'],
               
           ]);
           $user = $req->fetch();
                       
           if ($user){
                 
               if (password_verify($_POST['password'], $user['password'])){
   
                   $_SESSION['admin'] = $_POST['pseudo'];
                   header('location:index.php'); 
               }
               else {
                   $error = "<p class='error-form'>Identifiant ou mot de passe incorrect !</p>";
               }
           }else {
               $error = "<p class='error-form'>Identifiant ou mot de passe incorrect !</p>";
           }
           
       }
       else{
           $error = 'Remplir tous les champs !';
       }
   }

 
            
    
 

?>

    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <form method="POST">

               <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input value="<?php if((isset($_POST['pseudo']))) { echo $_POST['pseudo']; } ?>" name="pseudo" type="text" class="formulaire" id="exampleInputPseudo">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input value="<?php if((isset($_POST['password']))) { echo $_POST['password']; } ?>" name="password" type="password" class="formulaire" id="exampleInputPassword1">
                </div>
                <?php 
                
                if(isset($error)){
    
    echo'<div class="error">' . $error .'</div>';
}
                
                ?>
                <a href="register.php" title="Inscription">Je n'ai pas de compte ?</a> <br> <br>
                <button type="submit" class="bouton-php">Se connecter</button>

                <!--<input type="text" name="pseudo">
                <input type="password" name="password">
                <button>Se connecter</button>-->
            </form>
        </div>
        <div class="col-xl-2"></div>
    </div>
    </div>
 </section>

        <?php include'../layout/footer.php'?>
        <?php include'../layout/script.php'?>
        <?php include'../js/popup.php'?>
    
        <a class="scroll-to-top hidden-mobile visible" href="#" title="Scrolltop"><i class="fas fa-arrow-up "></i></a>
    </body>
</html>