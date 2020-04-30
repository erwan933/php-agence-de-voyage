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
        <title>Locasun | Admin </title>
    </head>

    <body>
   <?php require_once'../BDD/connexion-bdd.php'?>
      <header>
          
          
      </header>
      <section class="section2">
    <div class="container">


<h2>Se connecter : </h2>
<?php 

   if (isset($_POST) AND !empty($_POST)){
       
       if(!empty(htmlspecialchars($_POST['pseudo'])) AND !empty(htmlspecialchars($_POST['password']))){
           
           $req = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo AND password = :password');

           $req->execute([
               
               'pseudo' => $_POST['pseudo'],
               'password' => $_POST['password'],
               
           ]);
           $user = $req->fetchObject();
           if ($user){
               
               $_SESSION['admin'] = $_POST['pseudo'];
               header('location:index.php');
           }else {
               $error = 'Identifiant incorrect !';
           }
           
       }
       else{
           $error = 'Remplir tous les champs !';
       }
   }
if(isset($error)){
    
    echo'<div class="error">' . $error .'</div>';
}
    
    
?>

    <div class="row">
       <div class="col-xl-2"></div>
        <div class="col-xl-8">
        <form action="login.php" method="POST">
    
           <div class="form-group">
            <label for="exampleInputPseudo">Pseudo</label>
            <input value="<?php if((isset($_POST['pseudo']))) { echo $_POST['pseudo']; } ?>" name="pseudo" type="text" class="formulaire" id="exampleInputPseudo">
             
        </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input value="<?php if((isset($_POST['password']))) { echo $_POST['password']; } ?>" name="password" type="password" class="formulaire" id="exampleInputPassword1">
            
        </div>
            <a href="register.php">Je n'ai pas de compte ?</a> <br> <br>
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
       
        
        <a class="scroll-to-top hidden-mobile visible" href="#"><i class="fas fa-arrow-up "></i></a>
        
        
    </body>
</html>