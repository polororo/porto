<?php

session_start();

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
        // Vérifier si une image a été téléchargée
        if (empty($_FILES["image_file"]["tmp_name"])) {
            header("Location: dashboard.php?message=er");
            exit();
        }

        // Obtenir le nom de l'image sans l'extension
        $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME);

        // Renommer l'image en y ajoutant le nom de base et la date et l'heure
        $file_extension = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION);
        $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;

        try {
            $conn = new PDO("mysql:host=localhost;dbname=Cyberfolio;charset=utf8", "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Utiliser une requête préparée pour éviter les injections SQL
            $stmt = $conn->prepare("INSERT INTO baobab (titre, img, des) VALUES (:titre, :img, :des)");
            
            $stmt->execute([
                ':titre' => $_POST['titre'],
                ':img' => $new_image_name,
                ':des' => $_POST['des']
            ]);

            // Déplacer l'image vers le dossier "images"
            $target_directory = "C:/UwAmp/www/site/";
            if (!is_dir($target_directory)) {
                mkdir($target_directory, 0777, true);
            }
            
            $target_path = $target_directory . $new_image_name;
            
            if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_path)) {
                header("Location: dashboard.php?message=ok");
            } else {
                header("Location: dashboard.php?message=er");
            }
            exit();

        } catch(PDOException $e) {
            header("Location: dashboard.php?message=no");
            exit();
        }
    }
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script>
        // Force le scroll en haut de page au chargement
        window.onload = function() {
            window.scrollTo(0, 0);
        }
        // Force le scroll en haut à chaque changement de hash dans l'URL
        window.onhashchange = function() {
            window.scrollTo(0, 0); 
        }
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #1a1a1a;
            color: #fff;
            display: flex;
        }

        .menu {
            width: 250px;
            height: 100vh;
            background: #0b0516;
            padding: 20px;
            border-right: 1px solid #333;
        }

        .menu h2 {
            color: #45e8fd;
            text-align: center;
            margin-bottom: 30px;
        }

        .menu-items {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .menu-item {
            padding: 12px;
            color: #a6a6a6;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            background: rgba(69, 232, 253, 0.1);
            color: #45e8fd;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .projects-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .project-item {
            background: #0b0516;
            border: 1px solid #45e8fd;
            border-radius: 10px;
            padding: 15px;
            transition: all 0.3s ease;
        }

        .project-item:hover {
            box-shadow: 0 0 15px #45e8fd;
        }

        .project-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        .project-item h4 {
            color: #45e8fd;
            margin: 10px 0;
        }

        .project-item p {
            color: #a6a6a6;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .add-project-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: rgba(69, 232, 253, 0.1);
            border: 1px solid #45e8fd;
            color: #45e8fd;
            border-radius: 5px;
            cursor: pointer;
            font-size: 24px;
        }

        .add-project-btn:hover {
            background: #45e8fd;
            color: #0b0516;
        }

        .add-project-form, .modify-project-form {
            display: none;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background: #0b0516;
            border: 1px solid #45e8fd;
            border-radius: 10px;
            text-align: center;
        }

        .add-project-form input,
        .add-project-form textarea,
        .modify-project-form input,
        .modify-project-form textarea {
            width: 80%;
            padding: 15px;
            margin: 15px auto;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid #45e8fd;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            display: block;
        }

        .add-project-form textarea,
        .modify-project-form textarea {
            min-height: 200px;
            resize: vertical;
        }

        .add-project-form button,
        .modify-project-form button {
            padding: 15px 30px;
            background: rgba(69, 232, 253, 0.1);
            border: 1px solid #45e8fd;
            color: #45e8fd;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .add-project-form button:hover,
        .modify-project-form button:hover {
            background: #45e8fd;
            color: #0b0516;
        }
    </style>
</head>
<body>
    

    <div class="menu">
        <h2>Dashboard</h2>
        <div class="menu-items">
            <a href="#dashboard" class="menu-item" onclick="showSection('dashboard')">Tableau de bord</a>
            <a href="#projects" class="menu-item" onclick="showSection('projects')">Projets</a>
            <a href="#messages" class="menu-item" onclick="showSection('messages')">Messages</a>
            <a href="#settings" class="menu-item" onclick="showSection('settings')">Paramètres</a>
            <a href="index.php" class="menu-item">Déconnexion</a>
        </div>
    </div>

    <div class="content">
        <div id="dashboard" class="content-section active">
            <h1>Bienvenue dans votre espace administrateur</h1>
        </div>

        <div id="projects" class="content-section">
            <h1>Projets</h1>
            <button class="add-project-btn" onclick="toggleProjectForm()">+</button>
            
            <form class="add-project-form" id="addProjectForm" method="POST" enctype="multipart/form-data">
           
                <input type="text" name="titre" placeholder="Titre du projet" required>
                <label for="images" class="drop-container" id="dropcontainer">
            <span class="drop-title">Déposez les fichiers ici</span>
            ou
            <input type="file" name="image_file" id="images" accept="image/*" required>
        </label>
                <textarea name="des" placeholder="Description du projet" required></textarea>
                <button type="submit">Ajouter le projet</button>
            </form>
            
            <form class="modify-project-form" id="modifyProjectForm" method="POST" action="modify.php" enctype="multipart/form-data" style="display: none;">
                <input type="text" name="titre" id="modifyTitre" placeholder="Titre du projet" required>
                <label for="modifyImages" class="drop-container">
                    <span class="drop-title">Déposez les fichiers ici</span>
                    ou
                    <input type="file" name="image_file" id="modifyImages" accept="image/*">
                </label>
                <textarea name="des" id="modifyDes" placeholder="Description du projet" required></textarea>
                    <button type="submit" name="send">Modifier le projet</button>
                <button type="button" onclick="toggleModifyForm()">Annuler</button>
            </form>
            
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=Cyberfolio;charset=utf8", "root", "root");
            $im1 = $conn->prepare("SELECT * FROM baobab");
            $im1->execute();
            $results = $im1->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="projects-list" id="projectsList">
                <?php
                foreach($results as $row) {
                    ?>
                    <div class="project-item" style="position: relative;">
                        <h4><?=($row['titre']) ?></h4>
                        <img src="<?=($row['img']) ?>" alt="Image du projet">
                        <p><?=($row['des']) ?></p>
                        <a href="#" onclick="showModifyForm('<?=$row['id']?>', '<?=$row['titre']?>', '<?=$row['des']?>')" style="position: absolute; bottom: 10px; right: 40px;">
                            <img src="write.png" alt="Modifier" style="width: 20px; height: 20px;">
                        </a>
                        <a href="delete.php?id=<?=($row['id']) ?>" style="position: absolute; bottom: 10px; right: 10px;">
                            <img src="remove.png" alt="Supprimer" style="width: 20px; height: 20px;">
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div id="messages" class="content-section">
            <h1>Messages</h1>
        </div>

        <div id="settings" class="content-section">
            <h1>Paramètres</h1>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
            window.scrollTo(0, 0);
        }

        function toggleProjectForm() {
            const form = document.getElementById('addProjectForm');
            const projectsList = document.getElementById('projectsList');
            const modifyForm = document.getElementById('modifyProjectForm');
            
            if(form.style.display === 'block') {
                form.style.display = 'none';
                projectsList.style.display = 'grid';
            } else {
                form.style.display = 'block';
                modifyForm.style.display = 'none';
                projectsList.style.display = 'none';
            }
            window.scrollTo(0, 0);
        }

        function showModifyForm(id, titre, des) {
            const modifyForm = document.getElementById('modifyProjectForm');
            const projectsList = document.getElementById('projectsList');
            const addForm = document.getElementById('addProjectForm');
            
            document.getElementById('modifyTitre').value = titre;
            document.getElementById('modifyDes').value = des;
            modifyForm.action = 'modify.php?id=' + id;
            
            modifyForm.style.display = 'block';
            projectsList.style.display = 'none';
            addForm.style.display = 'none';
            
            window.scrollTo(0, 0);
        }

        function toggleModifyForm() {
            const modifyForm = document.getElementById('modifyProjectForm');
            const projectsList = document.getElementById('projectsList');
            
            modifyForm.style.display = 'none';
            projectsList.style.display = 'grid';
            window.scrollTo(0, 0);
        }
    </script>
</body>
</html>
