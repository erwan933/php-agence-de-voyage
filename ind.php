<?php
    include_once('bdd.php');
    session_start(); 
    if(!isset($_SESSION['logged_in'])) {
        header('location: log.php');
        exit();
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
        header('location: log.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<?php include'layout/head.php'?> 
<body>
   
   <?php include'layout/topbar.php'?>
   <?php include'layout/header.php'?>
   <?php include'landing/breadcrumb.php'?>
   
    <section class="section">
    <div class="container">
    <form method="POST">
        <h2>Page acceuil </h2>
        <p>Vous êtes connecté(e) <strong><?=$_SESSION['pseudo']?></strong></p>
        <a href="?logout=true&key=<?=$key?>">Se deconnecter</a>
        <a href="index.php">Accueil</a>
    </form>
    </div>
    </section>
    <?php include'layout/footer.php'?> 
    <?php include'layout/script.php'?> 
</body>
</html>