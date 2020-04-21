<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=projet-php', 'root', '');
}catch (PDOException $e) {
    exit('Database error');
}
?>