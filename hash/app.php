<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['hash']) && $_POST['hash'] !== '') {
        $hash_input = escapeshellarg($_POST['hash']);

        $python_path = 'C:\Users\Thibault-PC\AppData\Local\Microsoft\WindowsApps\python.exe';
        $script_path = 'C:\UwAmp\www\site\app.py';

        $command = escapeshellcmd("$python_path $script_path $hash_input");

        $output = shell_exec($command);

        if ($output === null) {
            $error = error_get_last();
            echo "<div class='error'>Erreur lors de l'exécution du script Python : " . $error['message'] . "</div>";
        } else {
            echo "<div class='hash-result'>Type de hash détecté : " . htmlspecialchars($output) . "</div>";
        }
    } else {
        echo "<div class='error'>La valeur du hash est obligatoire.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interagir avec le script Python</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background: #0b0516;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px #6c5ce7, 
                       0 0 20px #6c5ce7,
                       0 0 30px #6c5ce7;
            width: 100%;
            max-width: 600px;
        }

        .hash-result {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            background-color: rgba(244, 244, 244, 0.9);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        h1 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2em;
        }

        label {
            color: white;
            display: block;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .error {
            color: #ff4444;
            background-color: rgba(255, 68, 68, 0.1);
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 1em;
            transition: box-shadow 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
        }

        button {
            background-color: #6c5ce7;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #5b4bc4;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Interagir avec le script Python</h1>

        <form method="POST" action="">
            <label for="hash">Entrez un hash :</label>
            <input type="text" id="hash" name="hash" required placeholder="Entrez votre hash ici...">
            <button type="submit">Analyser le hash</button>
        </form>
    </div>
</body>

</html>

</body>

</html>
