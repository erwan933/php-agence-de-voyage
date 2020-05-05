<?php
    include_once('../BDD/connexion-bdd.php');
    session_start(); 
    

    $errorEmail = false;
    $errorPseudo = false;
    $errorPassword = false;

    if(isset($_POST['email'], $_POST['pseudo'], $_POST['password'])) {
        if(empty($_POST['email'])) {
            $errorEmail = "<p class='error-form'>Veuillez remplir ce champ !</p>";
        }else if(empty($_POST['pseudo'])) {
            $errorPseudo = "<p class='error-form'>Veuillez remplir ce champ !</p>";
        }else if (empty($_POST['password'])) {
            $errorPassword = "<p class='error-form'>Veuillez remplir ce champ !</p>";
        } else {
            $email = $_POST['email'];
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
    
            // check form email valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorEmail = "<p class='error-form'>* L'adresse email '$email' n'est pas valide.</p>";
            }
    
            // check number char pseudo < 10
            if (strlen($pseudo) > 10) {
                $errorPseudo = "<p class='error-form'>* Le pseudo ne dois pas contenir plus de 10 carractères !</p>";
            }
    
            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password); 
            $lowercase = preg_match('@[a-z]@', $password); 
            $number    = preg_match('@[0-9]@', $password); 
            // $specialChars = preg_match('@[^\w]@', $password);
    
            if(!$uppercase || !$lowercase || !$number ||  strlen($password) < 8) {
                $errorPassword = "<p class='error-form'>* Le mot de passe doit comporter au moins 8 caractères et doit comprendre au moins une lettre majuscule.</p>";
            }

            if($errorEmail == false && $errorPseudo == false && $errorPassword == false) {

                $password = md5($password); // hach password

                // first check the database to make sure 
                // a user does not already exist with the same pseudo and/or email
                $user_check_query = $pdo-> prepare("SELECT * FROM users WHERE email='$email' OR pseudo='$pseudo' LIMIT 1");
                
                $user_check_query->bindValue(1, $email);
                $user_check_query->bindValue(2, $pseudo);

                $user_check_query->execute();
                $num = $user_check_query->rowCount();
                $user = $user_check_query->fetch();
                if ($num == 1) { // if user exists
                    if ($user['email'] === $email) {
                        $errorEmail = "Email déjà existant, <a href='login.php'>connexion ?</a>";
                    }

                    if ($user['pseudo'] === $pseudo) {
                        $errorPseudo = "Pseudo déjà existant, <a href='login.php'>connexion ?</a>";
                    }
                } else {
                    $query = $pdo->prepare("INSERT INTO users(email, pseudo, password) VALUES(?, ?, ?)");
                    $query->bindValue(1, $email);
                    $query->bindValue(2, $pseudo);
                    $query->bindValue(3, $password);
                    $query->execute();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['pseudo'] = $pseudo;
                    header('location: index.php');
                    exit();
                }
            }
        }
            
    }
        

?>
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
    
</head>
<body>
   
  <header>
      <div class="container">
            <div class="topnav" id="myTopnav">
                 <div class="row">
                     <div class="col-md-1 ">
                          <a href="../index.php" class="logo"><img src="../img/logo2.png" alt="Logo Locasun" width="90rem"></a>
                     </div>   
                     <div class="col-md-4"></div>     
                     <div class="col-md-7">
                         <div class="right">
                              <a href="../voyages.php" class="active menu-padding" id="hover">NOS VOYAGES</a>
                              <a href="index.php" class=" menu-padding">Déposer une annonce</a>
                              
                              <a href="../contact.php" class=" menu-padding">Contact</a>
                          </div>
                    </div>
                </div>
             </div>
        </div>
        <div class="topnav-mobile" id="myTopnavMobile">
             <div class="right-mobile">
                  <a href="../index.php" class="menu-padding">Accueil</a>
                  <a href="../voyages.php" class=" active menu-padding">Nos voyages</a>
                  <a href="index.php" class=" menu-padding">Déposer une annonce</a>
                  <a href="../contact.php" class=" menu-padding">Contact</a>
                  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                  </a>
             </div>
      </div>
 </header>
<div class="breadcrumb-contact-admin" >
   <div class="text-center login-text h2">Inscription</div>                
</div> 
    
    <section class="section2">
        <div class="container">
            <div class="row">
               <div class="col-xl-2"></div>
                <div class="col-xl-8">
                <form method="POST">
                    <h2>Créer un compte </h2>
                    <div class="form-group">
                        <label for="exampleInputPseudo">Pseudo</label>
                        <input value="<?php if((isset($_POST['pseudo']))) { echo $_POST['pseudo']; } ?>" name="pseudo" type="text" class="formulaire" id="exampleInputPseudo">
                        <?php if($errorPseudo) ?> <small class="error form-text"> <?php echo $errorPseudo ?> </small> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input value="<?php if((isset($_POST['email']))) { echo $_POST['email']; } ?>" name="email" type="text" class="formulaire" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <?php if($errorEmail) ?> <small class="error form-text"> <?php echo $errorEmail ?> </small> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input value="<?php if((isset($_POST['password']))) { echo $_POST['password']; } ?>" name="password" type="password" class="formulaire" id="exampleInputPassword1">
                        <?php if($errorPassword) ?> <small class="error form-text"> <?php echo $errorPassword ?> </small>
                    </div>
                    
                    <a href="login.php">J'ai un compte ?</a> <br> <br>
                    <button type="submit" class="bouton-php">S'inscrire</button>
                </form>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>
</section>

    <?php include'../layout/footer.php'?>
    <?php include'../layout/script.php'?>
</body>
</html>