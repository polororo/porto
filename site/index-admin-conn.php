<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1a1a1a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #0b0516;
            padding: 40px;
            border-radius: 10px;
            border: 2px solid #45e8fd;
            box-shadow: 0 0 15px #45e8fd,
                       0 0 30px #45e8fd;
            width: 100%;
            max-width: 400px;
        }

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

        input {
            padding: 12px;
            border: 1px solid #45e8fd;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }

        input::placeholder {
            color: #a6a6a6;
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
    </style>
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="verify-login.php" method="POST">
            <h2>Connexion Administrateur</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>