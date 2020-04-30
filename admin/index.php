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
      <header>
          
          
      </header>
        <div class="container">


            <h2> Bienvenue <?= $_SESSION['admin']?> </h2>

        <p>Vous êtes connecté(e) <strong><?=$_SESSION['admin']?></strong></p>
        <a href="?logout=true&key=$_SESSION['admin']">Se deconnecter</a>
        </div>

        
        
        <?php include'../layout/footer.php'?>
        <?php include'../layout/script.php'?>
        <?php include'../js/popup.php'?>
       
        
        <a class="scroll-to-top hidden-mobile visible" href="#"><i class="fas fa-arrow-up "></i></a>
        
        
    </body>
</html>