<?php
    include'BDD/connexion-bdd.php';
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


    <div class="container">
    <form method="POST">
        <h1>Page acceuil </h1>
        <p>Vous êtes connecté(e) <strong><?=$_SESSION['pseudo']?></strong></p>
        <a href="?logout=true&key=<?=$key?>">Se deconnecter</a>
    </form>
    </div>
