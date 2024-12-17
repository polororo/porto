<?php


$servername = "localhost";  
$username = "root";         
$password = "root";             
$dbname = "cyberfolio";        


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO profile (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";


    if ($stmt = $conn->prepare($sql)) {
        
 
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashedPassword);

        
        if ($stmt->execute()) {
            echo "Les données ont été envoyées avec succès!";
        } else {
            echo "Erreur lors de l'insertion: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête: " . $conn->error;
    }
}

$conn->close();
?>
