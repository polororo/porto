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
            echo "<div class='output'>hash de type : " . htmlspecialchars($output) . "</div>";
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
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background: #0b0516;
            
        }

        .output {
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
            
        }
        h1 {
            color: white;
        }
        label{
            color: white;
        }

        .error {
            color: red;
        }
    </style>
</head>



<body>
    <h1>Interagir avec le script Python</h1>

    <form method="POST" action="">
        <label for="hash">Entrez un hash :</label>
        <input type="text" id="hash" name="hash" required>
        <button type="submit">Envoyer</button>
    </form>

</body>

</html>