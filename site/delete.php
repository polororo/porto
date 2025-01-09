<?php
$id = $_GET['id'];
$conn = new PDO("mysql:host=localhost;dbname=Cyberfolio;charset=utf8", "root", "root");
$im1 = $conn->prepare("DELETE FROM baobab WHERE id = $id");
$im1->execute();
header("Location: dashboard.php#projects");
?>