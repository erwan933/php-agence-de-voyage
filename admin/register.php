<?php session_start()?>
 
  <?php require_once'../BDD/connexion-bdd.php'?>
<?php 
 
    // Requêtes SQL pour récupérer toutes les lignes d'une table de la base de données
    $result = $pdo->query("SELECT * FROM users");
    
    if(isset($_GET["delete"])) {
  // Requêtes SQL qui supprime une ligne en base en lui passant l'id de l'article
  $result = $pdo->prepare('DELETE FROM users WHERE id = :id');
  // On execute la requête en précisant que l'ID est celui passé en URL
  $result->execute(array(
      'id' => $_GET["delete"]
  ));
        
} 


    
 //$pdo = new PDO('mysql:host=localhost;dbname=blog; charset = utf8', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    if(!empty($_POST["pseudo"])) {
    $result = $pdo->prepare("INSERT INTO users (nom,prenom, pseudo,email, password) VALUES (:nom, :prenom, :pseudo,:email, :password)");
        $result->execute(array(
            
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'pseudo' => $_POST['pseudo'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
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
        <meta name="viewport" email="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/dark.css">
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../img/favicon.png">
        <meta name="description" email="LocaSun est l'agence idéale pour l'organisation de vos voyages, faites confiance à LocaSun pour un voyage réussi">
        <meta property="og:nom" email="LocaSun | Pour un voyage réussi" />
        <meta property="og:url" email="http://www.projet-php.topadev.com" />
        <meta property="og:password" email="http://www.projet-php.topadev.com/img/slide-1.jpg" />

        <link rel="stylesheet" href="../css/popup.css">   

        <script src="https://kit.fontawesome.com/c9bc4d46f8.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
        <nom>Locasun | Admin </nom>
    </head>

    <body>
  
      <header>
          
          
      </header>
      <section class="section2">
    <div class="container">







<h2>S'inscrire : </h2>


    <div class="row">
       <div class="col-xl-2"></div>
        <div class="col-xl-8">
        
            
              <form method="POST">
                    

                   
                   <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="nom"><br /><br />
                    <br />
                    
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="prenom"><br /><br />
                    <br />
                    
                    
                    
                    
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" placeholder="pseudo"><br /><br />
                    <br />

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="email"><br /><br />
                    <br />

                    <label for="password">Mot de passe</label>
                    <input type="text" id="password" name="password" placeholder="password"><br /><br />
                    <br />




                    <input type="submit" value="Envoyer" id="target">

                    
                          


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