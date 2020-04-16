<?php
    include'BDD/connexion-bdd.php';
    session_start(); 
    if(!isset($_SESSION['logged_in'])) {
        header('location: connexion.php');
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
        header('location: connexion.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form method="POST">
        <h1>Page acceuil </h1>
        <p>Vous êtes connecté(e) <strong><?=$_SESSION['pseudo']?></strong></p>
        <a href="?logout=true&key=<?=$key?>">Se deconnecter</a>
    </form>
    </div>
</body>
</html>