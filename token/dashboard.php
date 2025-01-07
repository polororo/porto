<?php
session_start();

// Génération sécurisée du token
$token = ''; // Initialisation par défaut pour éviter les erreurs

// Vérification si l'utilisateur est authentifié
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index-admin-conn.php");
    exit;
}

// Vérification du token
if (!isset($_COOKIE['auth_token']) || $_COOKIE['auth_token'] !== $_SESSION['auth_token']) {
    header("Location: index-admin-conn.php");
    exit;
}

// Stocker le token dans un cookie valide uniquement pour la session (durée de vie 0)
setcookie('auth_token', $token, 0, '/', '', true, true); // Durée de vie 0 = cookie de session
$_SESSION['auth_token'] = $token;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=cyberfolio", "root", "root");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("INSERT INTO baobab (img, des, titre) VALUES (:img, :des, :titre)");
        
        $stmt->execute([
            ':img' => htmlspecialchars('img4.webp'),
            ':des' => htmlspecialchars($_POST['des']),
            ':titre' => htmlspecialchars($_POST['titre']),
        ]);
        
        $trans = array(
            'des' => $_POST['des'],
            'titre' => $_POST['titre'], 
            'img' => 'img4.webp'
        );

        echo "<p style='color: #45e8fd; text-align: center; margin-bottom: 20px;'>Message envoyé avec succès!</p>";
    } catch(PDOException $e) {
        echo "<p style='color: #ff04ff; text-align: center; margin-bottom: 20px;'>Erreur: " . $e->getMessage() . "</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <style>
        /* Global body styles */
        body {
            font-family: Arial, sans-serif;
            background: #1a1a1a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Contact form styling */
        .contact-form {
            position: fixed;
            top: 50%; /* Position initiale pour centrer verticalement */
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 600px;
            background: #0b0516;
            padding: 40px;
            border-radius: 20px;
            border: 4px solid #45e8fd;
            box-shadow: 0 0 15px #45e8fd, 0 0 30px #45e8fd;
            transition: all 0.8s ease;
            z-index: 1001;
        }

        /* To make the contact form appear smoothly */
        .contact-form.show {
            top: 50%;
        }

        /* Form elements styling */
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid #45e8fd;
            border-radius: 5px;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .contact-form input::placeholder {
            color: #a6a6a6;
        }

        .contact-form button {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 10px 20px;
            border: 1px solid #45e8fd;
            box-shadow: 0 0 10px #45e8fd;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .contact-form button:hover {
            background: #45e8fd;
            box-shadow: 0 0 15px #45e8fd;
        }

        /* Keyframes for animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes loading {
            0% { width: 0%; }
            100% { width: 100%; }
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 0.8; }
        }

        /* Login container */
        .login-container {
            background: #0b0516;
            padding: 40px;
            border-radius: 10px;
            border: 2px solid #45e8fd;
            box-shadow: 0 0 15px #45e8fd, 0 0 30px #45e8fd;
            width: 100%;
            max-width: 400px;
        }

        /* Login form layout */
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        h2 {
            color: #a6a6a6;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Input and button styles */
        input {
            padding: 12px;
            border: 1px solid #45e8fd;
            background: rgba(240, 240, 240, 0.1);
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }

        button {
            padding: 12px;
            background: rgba(69, 232, 253, 0.1);
            border: 1px solid #45e8fd;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #45e8fd;
            box-shadow: 0 0 15px #45e8fd;
        }

        /* Responsive design adjustments */
        @media (max-width: 768px) {
            .contact-form {
                width: 90%;
            }

            .login-container {
                width: 90%;
            }
        }

    </style>
</head>
<body>
    <div class="contact-form" id="contactForm">
        <form method="POST" action="">
            <div class="form-group">
                <label for="des">Description</label>
                <input type="text" id="des" name="des" required>
            </div>
            
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" id="titre" name="titre" required>
            </div>
            
            <div style="text-align: center;">
                <button type="submit" class="submit-btn">Créer le projet</button>
            </div>
        </form>

    </div>
</body>
</html>
