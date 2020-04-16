<?php
    include'BDD/connexion-bdd.php';
    //session_start(); 
    if(isset($_SESSION['logged_in'])) {
        header('location: essay.php');
    }

    $errorEmail = false;
    $errorPseudo = false;
    $errorPassword = false;

    if(isset($_POST['email'], $_POST['pseudo'], $_POST['password'])) {
        if(empty($_POST['email'])) {
            $errorEmail = "Champs vide";
        }else if(empty($_POST['pseudo'])) {
            $errorPseudo = "Champs vide";
        }else if (empty($_POST['password'])) {
            $errorPassword = "Champs vide";
        } else {
            $email = $_POST['email'];
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
    
            // check form email valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorEmail = "L'adresse email '$email' est considérée comme invalide.";
            }
    
            // check number char pseudo < 10
            if (strlen($pseudo) > 10) {
                $errorPseudo = "Le Pseudo est trop long!";
            }
    
            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password); 
            $lowercase = preg_match('@[a-z]@', $password); 
            $number    = preg_match('@[0-9]@', $password); 
            // $specialChars = preg_match('@[^\w]@', $password);
    
            if(!$uppercase || !$lowercase || !$number ||  strlen($password) < 8) {
                $errorPassword = "Le mot de passe doit comporter au moins 8 caractères et doit comprendre au moins une lettre majuscule, un chiffre et un caractère spécial.";
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
                        $errorEmail = "email already exists";
                    }

                    if ($user['pseudo'] === $pseudo) {
                        $errorPseudo = "pseudo already exists";
                    }
                } else {
                    $query = $pdo->prepare("INSERT INTO users(email, pseudo, password) VALUES(?, ?, ?)");
                    $query->bindValue(1, $email);
                    $query->bindValue(2, $pseudo);
                    $query->bindValue(3, $password);
                    $query->execute();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['pseudo'] = $pseudo;
                    header('location: essay.php');
                    exit();
                }
            }
        }
            
    }
?>

            <form method="POST">
                <h1 class="h2">Créer un compte </h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input value="<?php if((isset($_POST['email']))) { echo $_POST['email']; } ?>" name="email" type="text" class="formulaire" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="contact@exemple.fr">
                    <?php if($errorEmail) ?> <small class="error form-text"> <?php echo $errorEmail ?> </small> 
                </div>
                <div class="form-group">
                    <label for="exampleInputPseudo">Pseudo</label>
                    <input value="<?php if((isset($_POST['pseudo']))) { echo $_POST['pseudo']; } ?>" name="pseudo" type="text" class="formulaire" id="exampleInputPseudo" placeholder="Maurice99">
                    <?php if($errorPseudo) ?> <small class="error form-text"> <?php echo $errorPseudo ?> </small> 
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input value="<?php if((isset($_POST['password']))) { echo $_POST['password']; } ?>" name="password" type="password" class="formulaire" id="exampleInputPassword1">
                    <?php if($errorPassword) ?> <small class="error form-text"> <?php echo $errorPassword ?> </small>
                </div>
                <a href="#modal1">J'ai un compte ?</a> <br> <br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        