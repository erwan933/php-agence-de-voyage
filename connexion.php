<?php
    include'BDD/connexion-bdd.php';
    //session_start(); 
    if(isset($_SESSION['logged_in'])) {
        header('location: essay.php');
        exit();
    }
    $errorPseudo = false;
    $errorPassword = false;
    $errorAuth = false;
    if(isset($_POST['pseudo'], $_POST['password'])) {
        if(empty($_POST['pseudo'])) {
            $errorPseudo = "Champs vide";
        }else if (empty($_POST['password'])) {
            $errorPassword = "Champs vide";
        } else {
            $pseudo = $_POST['pseudo'];
            $password_1 = $_POST['password'];
            $password = md5($password_1); // hach password for compare with db password

            $query = $pdo->prepare("SELECT * FROM users where pseudo = ? AND password = ?");
            $query->bindValue(1, $pseudo);
            $query->bindValue(2, $password);

            $query->execute();
            $num = $query->rowCount();

            // if user exits or not 
            if($num ==1) {
                $_SESSION['logged_in'] = true;
                $_SESSION['pseudo'] = $pseudo;
                header('location: essay.php');
                exit();
            } else {
                $errorAuth = 'le pseudo ou le mot de passe est incorrect';
            }
            
        }
            
        
    }
?>

            <form method="POST">
                <h1 class="h2">Se connecter </h1>
                <?php if($errorAuth) ?> <small class="error form-text"> <?php echo $errorAuth ?> </small>
                <div class="form-group">
                    <label for="exampleInputPseudo">Pseudo :</label>
                    <input value="<?php if((isset($_POST['pseudo']))) { echo $_POST['pseudo']; } ?>" name="pseudo" type="text" class="formulaire" id="exampleInputPseudo">
                    <?php if($errorPseudo) ?> <small class="error form-text"> <?php echo $errorPseudo ?> </small> 
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe :</label>
                    <input value="<?php if((isset($_POST['password']))) { echo $_POST['password']; } ?>" name="password" type="password" class="formulaire" id="exampleInputPassword1">
                    <?php if($errorPassword) ?> <small class="error form-text"> <?php echo $errorPassword ?> </small>
                </div>
                <a href="annonce.php">Je n' ai pas de compte ? S'inscrire</a> <br> <br>
                <button type="submit" class="bouton-php">Connexion</button>
            </form>
