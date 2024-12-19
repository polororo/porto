<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cyberfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM connexion WHERE email = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        // exit(print_r($result, true));
        
        if ($result->num_rows > 0) {
            
            $user = $result->fetch_assoc();

            // password_hash('Test1', PASSWORD_DEFAULT);

            if (password_verify($password, $user['password'])) {
                
                $_SESSION['user_id'] = $user['id']; 
                $_SESSION['email'] = $user['email'];
                header("Location: dashboard.php"); 
                exit();
            } else {
                
                $error_message = "Mot de passe incorrect.";
            }
        } else {
            
            $error_message = "Aucun utilisateur trouvé avec cet email.";
        }

        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête: " . $conn->error;
    }
    
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirection Page</title>
    <script>
        // Redirection après le chargement de la page
        window.onload = function() {
        setTimeout(function() {
            window.location.href = "admin.php";  // Redirige après 2 secondes
        },)
    };
    </script>
</head>
<body>
</body>
</html>