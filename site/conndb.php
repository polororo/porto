<?php 

$conn = new PDO("mysql:host=localhost;dbname=Cyberfolio;charset=utf8", "root", "root");

if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}
?>

