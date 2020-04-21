<?php
    include_once('bdd.php');
    session_start(); 
    if(isset($_SESSION['logged_in'])) {
        header('location: ind.php');
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
                header('location: ind.php');
                exit();
            } else {
                $errorAuth = 'Le pseudo ou le mot de passe est incorrect';
            }
            
        }
            
        
    }
?>
<!DOCTYPE html>
<html lang="fr">
<?php include'layout/head.php'?>
<body>
   <?php include'layout/topbar.php'?>
   <?php include'layout/header.php'?>
   <?php include'landing/breadcrumb.php'?>
    
    <section class="section2">
    <div class="container">
    <div class="row">
       <div class="col-xl-2"></div>
        <div class="col-xl-8">
    <form method="POST">
        <h2>Se connecter </h2>
        <?php if($errorAuth) ?> <small class="error form-text"> <?php echo $errorAuth ?> </small>
        <div class="form-group">
            <label for="exampleInputPseudo">Pseudo</label>
            <input value="<?php if((isset($_POST['pseudo']))) { echo $_POST['pseudo']; } ?>" name="pseudo" type="text" class="formulaire" id="exampleInputPseudo">
            <?php if($errorPseudo) ?> <small class="error form-text"> <?php echo $errorPseudo ?> </small> 
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input value="<?php if((isset($_POST['password']))) { echo $_POST['password']; } ?>" name="password" type="password" class="formulaire" id="exampleInputPassword1">
            <?php if($errorPassword) ?> <small class="error form-text"> <?php echo $errorPassword ?> </small>
        </div>
        <a href="reg.php">Je n'ai pas de compte ?</a> <br> <br>
        <button type="submit" class="bouton-php">Se connecter</button>
    </form>
    </div>
       <div class="col-xl-2"></div>
        </div>
    </div>
 </section>
    <?php include'layout/footer.php'?>
    <?php include'layout/script.php'?>
</body>
</html>