<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberFolio</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(45deg, #161616, #252525);
            position: relative;
            overflow-x: hidden;
            cursor: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
       
        .side-text {
            position: fixed;
            left: -100px; 
            top: 50%;
            transform: translateY(-50%) rotate(-90deg);
            transform-origin: left center;
            color: #ff04ff;
            font-family: 'Arial', sans-serif;
            font-size: 3em;
            text-shadow: 0 0 20px #ff04ff,
                        0 0 40px #ff04ff;
            z-index: 1000;
            letter-spacing: 3px;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transition: all 1s ease;
            padding: 20px;
            border: 4px solid #45e8fd;
            border-radius: 25px;
            box-shadow: 0 0 15px #45e8fd,
                       0 0 30px #45e8fd;
        }

        @media (max-width: 768px) {
            .side-text {
                font-size: 2em;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .side-text {
                font-size: 1.5em;
                padding: 5px;
            }
        }

        .side-text.visible {
            left: 20px; 
            opacity: 1;
            visibility: visible;
        }

        .cursor {
            width: 20px;
            height: 20px;
            background: rgba(128, 128, 128, 0.3);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            mix-blend-mode: screen;
            box-shadow: 0 0 15px #808080,
                       0 0 30px #808080,
                       0 0 45px #808080;
            animation: cursorAnimation 2s infinite;
        }

        @media (max-width: 768px) {
            .cursor {
                display: none;
            }
            body {
                cursor: auto;
            }
        }

        .contact-text {
            position: fixed;
            top: -100px;
            right: 20px;
            color: #ff04ff;
            text-shadow: 0 0 10px #ff04ff,
                         0 0 30px #ff04ff,
                         0 0 40px #ff04ff;
            font-family: 'Arial', sans-serif;
            font-size: 1.3em;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
            text-decoration: none;
            opacity: 0;
            visibility: hidden;
            padding: 10px 20px;
            border: 2px solid #45e8fd;
            border-radius: 10px;
            box-shadow: 0 0 10px #45e8fd;
            animation: morph 8s ease-in-out infinite;
        }

        @media (max-width: 768px) {
            .contact-text {
                font-size: 1.1em;
                padding: 8px 16px;
            }
        }

        @media (max-width: 480px) {
            .contact-text {
                font-size: 1em;
                padding: 6px 12px;
                right: 10px;
            }
        }

        .contact-text.visible {
            opacity: 1;
            visibility: visible;
            animation: slideInFromTop 0.5s ease-out forwards, morph 8s ease-in-out infinite;
        }

        .contact-text:hover {
            color: #45e8fd;
            text-shadow: 0 0 10px #45e8fd;
            border-color: #45e8fd;
        }

        @keyframes cursorAnimation {
            0% {
                transform: scale(1) rotate(0deg);
                border-radius: 50%;
            }
            50% {
                transform: scale(1.5) rotate(180deg);
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            }
            100% {
                transform: scale(1) rotate(360deg);
                border-radius: 50%;
            }
        }
        
        .title {
            position: relative;
            margin-top: 30px; 
            font-size: 3em;
            font-family: 'Arial', sans-serif;
            color: #ff04ff;
            text-shadow: 0 0 15px #ff04ff;
            opacity: 0;
            transition: all 0.5s ease-in;
            padding: 30px;
            border: 4px solid #45e8fd;
            border-radius: 10px;
            background: #170c2e;
            transform-origin: top center;
            animation: swingSign 3s ease-in-out infinite;
            box-shadow: 0 0 15px #45e8fd,
                       0 0 30px #45e8fd;
            cursor: pointer;
            border: none;
        }

        @media (max-width: 768px) {
            .title {
                font-size: 2.5em;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .title {
                font-size: 2em;
                padding: 15px;
                margin-top: 20px;
            }
        }

        .title::before {
            content: '';
            position: absolute;
            top: -40px;
            left: 50%;
            width: 4px;
            height: 40px;
            background: #808080;
            transform: translateX(-50%);
            box-shadow: 0 0 10px #cccccc;
        }

        @keyframes swingSign {
            0%, 100% {
                transform: rotate(-3deg);
            }
            50% {
                transform: rotate(3deg);
            }
        }

        .title.visible {
            opacity: 1;
        }

        @keyframes wave {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
        }
        
        body::before {
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, transparent 20%, #000 80%);
            opacity: 0.5;
            z-index: -1;
        }

        #loader ~ body::before {
            background: radial-gradient(circle, transparent 20%, #000 80%),
                        url('data:image/svg+xml,<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"><circle cx="100" cy="100" r="1" fill="white"/></svg>') repeat;
            animation: twinkle 5s infinite;
        }

        .loader-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            text-align: center;
            z-index: 1;
        }

        @media (max-width: 480px) {
            .loader-container {
                width: 80%;
            }
        }

        .progress-bar {
            width: 100%;
            height: 20px;
            background-color: rgba(221, 221, 221, 0.2);
            border-radius: 10px;
            box-shadow: 0 0 15px #d504ff;
            overflow: hidden;
        }

        .progress {
            width: 0%;
            height: 100%;
            background: linear-gradient(20deg, #230c2e, #d504ff);
            animation: loading 2s linear forwards;
            box-shadow: 0 0 15px #808080;
        }

        .projects-container {
            position: relative;
            width: 60%;
            max-width: 800px;
        }

        .projects-list {
            width: 100%;
            margin: 40px auto;
            background: #0b0516;
            padding: 40px;
            color: #fff;
            font-family: 'Arial', sans-serif;
            opacity: 0;
            display: none;
            animation: fadeIn 1.5s ease-out forwards;
            animation-delay: 0.5s;
            border: 4px solid #45e8fd;
            border-radius: 75px;
            box-shadow: 0 0 15px #45e8fd,
                       0 0 30px #45e8fd;
            transition: all 0.8s ease;
        }

        .next-arrow, .prev-arrow {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            font-size: 3em;
            color: #45e8fd;
            cursor: pointer;
            text-shadow: 0 0 15px #45e8fd;
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 999;
        }

        .next-arrow {
            right: 20px;
        }

        .prev-arrow {
            left: 150px;
        }

        .next-arrow.visible, .prev-arrow.visible {
            opacity: 1;
            visibility: visible;
        }

        .next-arrow:hover, .prev-arrow:hover {
            transform: translateY(-50%) scale(1.2);
        }

        .slide-left {
            transform: translateX(-200%);
            opacity: 0;
        }

        .slide-right {
            transform: translateX(200%);
            opacity: 0;
        }

        .slide-center {
            transform: translateX(0);
            opacity: 1;
        }

        .slide-from-left {
            animation: slideFromLeft 0.8s forwards;
        }

        @keyframes slideFromLeft {
            from {
                transform: translateX(-200%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .fly-away {
            transform: translateY(-200vh) !important;
            opacity: 0 !important;
        }

        @media (max-width: 768px) {
            .projects-list {
                width: 70%;
                padding: 20px;
                border-radius: 40px;
            }
        }

        @media (max-width: 480px) {
            .projects-list {
                width: 85%;
                padding: 15px;
                border-radius: 25px;
            }
        }

        .projects-list h3 {
            color: #a6a6a6;
            margin-top: 0;
            text-align: center;
            font-size: 2.3em;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .projects-list h3 {
                font-size: 2em;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .projects-list h3 {
                font-size: 1.8em;
                margin-bottom: 15px;
            }
        }

        .projects-list ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        @media (max-width: 768px) {
            .projects-list ul {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 15px;
            }
        }

        @media (max-width: 480px) {
            .projects-list ul {
                grid-template-columns: 1fr;
                gap: 10px;
            }
        }

        .project-item {
            padding: 20px;
            color: rgba(255, 255, 255, 0.8);
            background: rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .project-item {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .project-item {
                padding: 10px;
            }
        }

        .project-item:hover {
            background: rgba(128, 128, 128, 0.1);
            transform: translateY(-5px);
        }

        .project-item h4 {
            color: #808080;
            margin-top: 0;
            font-size: 1.2em;
        }

        .project-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin: 10px 0;
        }

        @media (max-width: 480px) {
            .project-item img {
                height: 150px;
            }
        }

        .project-item p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .hidden {
            display: none;
        }

        .contact-form {
            position: fixed;
            top: 150%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 600px;
            background: #0b0516;
            padding: 40px;
            border-radius: 20px;
            border: 4px solid #45e8fd;
            box-shadow: 0 0 15px #45e8fd,
                       0 0 30px #45e8fd;
            transition: all 0.8s ease;
            z-index: 1001;
        }

        .contact-form.show {
            top: 50%;
        }

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

        @keyframes slideInFromTop {
            0% {
                top: -100px;
                opacity: 0;
            }
            100% {
                top: 20px;
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    
    <div class="side-text" id="side-text" >Loann Ordvpn</div>
    <div class="cursor"></div>
    <a href="index.php"><button class="title" id="mainTitle">CyberFolio</button></a>
    <div class="loader-container" id="loader">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
    </div>

    <div class="projects-container">
        <div class="projects-list" id="projectsList">
            <h3>Semaine 2</h3>
            <img src="equipe.jpg" alt="Image équipe" style="width: 100%; height: auto; margin: 20px 0; cursor: pointer;" onclick="openModal(this)">
            <p style="display: flex; justify-content: space-around; text-align: center; color: #45e8fd; font-size: 1.2em;">
                <span style=" font-weight: bold;">Clément</span>
                <span style=" font-weight: bold;">Léopold</span>
                <span style=" font-weight: bold;">Gabin</span>
                <span style=" font-weight: bold;">Thibault</span>
            </p>
        </div>
        <div class="projects-list" id="siteDynamique" style="display: none;">
            <h3>Site Dynamique</h3>
            <img src="projet.png" alt="Image équipe" style="width: 70%; height: auto; margin: 15px auto; display: block; cursor: pointer;" onclick="openModal(this)">
            <p style="text-align: center; font-size: 1.3em;">Visualisation des projets dans une page dynamique.</p>
        </div>

        <!-- Modal pour l'image agrandie -->
        <div id="imageModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9); z-index: 1000;">
            <img id="modalImage" style="max-width: 90%; max-height: 90vh; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); object-fit: contain;">
            <span style="position: absolute; top: 15px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; cursor: pointer;" onclick="closeModal()">&times;</span>
        </div>

    

        <div class="projects-list" id="databaseList" style="display: none;">
            <h3>Base de données</h3>
            <img src="db.png" alt="Image équipe" style="width: 100%; height: auto; margin: 20px 0; cursor: pointer;" onclick="openModal(this)">
            <img src="conn-php.png" alt="Image connexion PHP" style="width: 100%; height: auto; margin: 20px 0; cursor: pointer;" onclick="openModal(this)">
            <p style="text-align: center; font-size: 1.3em;">Contenu de la base de données et scipt de connexion PHP.</p>
        </div>

        <div class="projects-list" id="phpList" style="display: none;">
            <h3>Boucle PHP</h3>
            <img src="div-php.png" alt="Image boucle PHP" style="width: 100%; height: auto; margin: 20px 0; cursor: pointer;" onclick="openModal(this)">
            <p style="text-align: center; font-size: 1.3em;">Utilisation de foreach pour créer un projet par ligne dans la base de données.</p>
        </div>

        <div class="projects-list" id="adminList" style="display: none;">
            <h3>Connexion Admin</h3>
            <img src="admin.png" alt="Image connexion admin" style="width: 60%; height: auto; margin: 20px auto; display: block; cursor: pointer;" onclick="openModal(this)">
            <p style="text-align: center; font-size: 1.3em;">Page dans une URL cachée pour la connexion administrateur.</p>
        </div>

        <div class="projects-list" id="verificationPhpList" style="display: none;">
            <h3>Vérification PHP</h3>
            <img src="if1.png" alt="Image vérification PHP" style="width: 80%; height: auto; margin: 20px auto; display: block; cursor: pointer;" onclick="openModal(this)">
            <img src="if2.png" alt="Image vérification PHP" style="width: 80%; height: auto; margin: 20px auto; display: block; cursor: pointer;" onclick="openModal(this)">
        </div>

        <div class="projects-list" id="contactPageList" style="display: none;">
            <h3>Page Contact</h3>
            <img src="contact.png" alt="Image page contact" style="width: 80%; height: auto; margin: 20px auto; display: block; cursor: pointer;" onclick="openModal(this)">
        </div>

        <div class="projects-list" id="pythonList" style="display: none;">
            <h3>Script Python</h3>
            <img src="py.png" alt="Image script python" style="width: 80%; height: auto; margin: 20px auto; display: block; cursor: pointer;" onclick="openModal(this)">
        </div>

        <div class="projects-list" id="difficultList" style="display: none;">
            <h3>Difficultés rencontrées</h3>
            <div style="display: flex; flex-direction: column; gap: 35px; padding: 20px;">
                <div style="border: 2px solid #45e8fd; border-radius: 10px; padding: 15px; color: #fff; font-size: 1.5em;">
                    Difficulté avec la prise en main et l'apprentissage du langage PHP.
                </div>
                <div style="border: 2px solid #45e8fd; border-radius: 10px; padding: 15px; color: #fff; font-size: 1.5em;">
                    Problèmes rencontrés avec l'envoi automatique des emails via PHP. 
                </div>
                <div style="border: 2px solid #45e8fd; border-radius: 10px; padding: 15px; color: #fff; font-size: 1.5em;">
                    Complexité dans la création d'une interface responsive.
                </div>
            </div>
        </div>

        <div class="projects-list" id="merciList" style="display: none;">
            <h3>Merci </h3>
            <h3>De </h3>
            <h3>Votre </h3>
            <h3>Ecoute </h3>
            </div>
        </div>
    </div>

    <div class="prev-arrow" id="prevArrow"><</div>
    <div class="next-arrow" id="nextArrow">></div>

    <div class="contact-form" id="contactForm">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $conn = new PDO("mysql:host=localhost;dbname=cyberfolio", "root", "root");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $stmt = $conn->prepare("INSERT INTO contact (nom, mail, sujet, msg) VALUES (:nom, :mail, :sujet, :msg)");
                
                $stmt->execute([
                    ':nom' => htmlspecialchars($_POST['nom']),
                    ':mail' => htmlspecialchars($_POST['mail']),
                    ':sujet' => htmlspecialchars($_POST['sujet']),
                    ':msg' => htmlspecialchars($_POST['msg'])
                ]);
                
                $trans = array(
                    'message' => $_POST['msg'],
                    'email' => $_POST['mail'],
                    'sujet' => $_POST['sujet']
                );
                
                file_put_contents("data.json", json_encode($trans));
                exec("python ./sender_mail.py");

                echo "<p style='color: #45e8fd; text-align: center; margin-bottom: 20px;'>Message envoyé avec succès!</p>";
            } catch(PDOException $e) {
                echo "<p style='color: #ff04ff; text-align: center; margin-bottom: 20px;'>Erreur: " . $e->getMessage() . "</p>";
            }
        }
        ?>
        <h2 style="color: #a6a6a6; text-align: center; font-size: 2em;">Contactez-moi</h2>
        <form method="POST" action="">
            <input type="text" name="nom" placeholder="Votre nom" required>
            <input type="email" name="mail" placeholder="Votre email" required>
            <input type="text" name="sujet" placeholder="Sujet" required>
            <textarea name="msg" rows="5" placeholder="Votre message" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </div>

    <script>
        
        const cursor = document.querySelector('.cursor');
        
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });

        setTimeout(() => {
            document.getElementById('loader').classList.add('hidden');
            
            document.getElementById('mainTitle').classList.add('visible');
            
            document.getElementById('side-text').classList.add('visible');

            document.getElementById('projectsList').style.display = 'block';
            
            document.getElementById('nextArrow').classList.add('visible');
        
        }, 2000);
        
        document.getElementById('nextArrow').addEventListener('click', () => {
            const projectsList = document.getElementById('projectsList');
            const siteDynamique = document.getElementById('siteDynamique');
            const databaseList = document.getElementById('databaseList');
            const phpList = document.getElementById('phpList');
            const adminList = document.getElementById('adminList');
            const verificationPhpList = document.getElementById('verificationPhpList');
            const contactPageList = document.getElementById('contactPageList');
            const pythonList = document.getElementById('pythonList');
            const difficultList = document.getElementById('difficultList');
            const merciList = document.getElementById('merciList');

            if (projectsList.style.display !== 'none') {
                projectsList.classList.add('slide-left');
                
                setTimeout(() => {
                    projectsList.style.display = 'none';
                    siteDynamique.style.display = 'block';
                    siteDynamique.classList.add('slide-right');
                    
                    setTimeout(() => {
                        siteDynamique.classList.remove('slide-right');
                        siteDynamique.classList.add('slide-center');
                        document.getElementById('prevArrow').classList.add('visible');
                    }, 50);
                }, 800);
            } else if (siteDynamique.style.display !== 'none') {
                siteDynamique.classList.remove('slide-center');
                siteDynamique.classList.add('slide-left');
                
                setTimeout(() => {
                    siteDynamique.style.display = 'none';
                    databaseList.style.display = 'block';
                    databaseList.classList.add('slide-right');
                    
                    setTimeout(() => {
                        databaseList.classList.remove('slide-right');
                        databaseList.classList.add('slide-center');
                    }, 50);
                }, 800);
            } else if (databaseList.style.display !== 'none') {
                databaseList.classList.remove('slide-center');
                databaseList.classList.add('slide-left');
                
                setTimeout(() => {
                    databaseList.style.display = 'none';
                    phpList.style.display = 'block';
                    phpList.classList.add('slide-right');
                    
                    setTimeout(() => {
                        phpList.classList.remove('slide-right');
                        phpList.classList.add('slide-center');
                    }, 50);
                }, 800);
            } else if (phpList.style.display !== 'none') {
                phpList.classList.remove('slide-center');
                phpList.classList.add('slide-left');
                
                setTimeout(() => {
                    phpList.style.display = 'none';
                    adminList.style.display = 'block';
                    adminList.classList.add('slide-right');
                    
                    setTimeout(() => {
                        adminList.classList.remove('slide-right');
                        adminList.classList.add('slide-center');
                    }, 50);
                }, 800);
            } else if (adminList.style.display !== 'none') {
                adminList.classList.remove('slide-center');
                adminList.classList.add('slide-left');
                
                setTimeout(() => {
                    adminList.style.display = 'none';
                    verificationPhpList.style.display = 'block';
                    verificationPhpList.classList.add('slide-right');
                    
                    setTimeout(() => {
                        verificationPhpList.classList.remove('slide-right');
                        verificationPhpList.classList.add('slide-center');
                    }, 50);
                }, 800);
            } else if (verificationPhpList.style.display !== 'none') {
                verificationPhpList.classList.remove('slide-center');
                verificationPhpList.classList.add('slide-left');
                
                setTimeout(() => {
                    verificationPhpList.style.display = 'none';
                    contactPageList.style.display = 'block';
                    contactPageList.classList.add('slide-right');
                    
                    setTimeout(() => {
                        contactPageList.classList.remove('slide-right');
                        contactPageList.classList.add('slide-center');
                    }, 50);
                }, 800);
            } else if (contactPageList.style.display !== 'none') {
                contactPageList.classList.remove('slide-center');
                contactPageList.classList.add('slide-left');
                
                setTimeout(() => {
                    contactPageList.style.display = 'none';
                    pythonList.style.display = 'block';
                    pythonList.classList.add('slide-right');
                    
                    setTimeout(() => {
                        pythonList.classList.remove('slide-right');
                        pythonList.classList.add('slide-center');
                    }, 50);
                }, 800);
            } else if (pythonList.style.display !== 'none') {
                pythonList.classList.remove('slide-center');
                pythonList.classList.add('slide-left');
                
                setTimeout(() => {
                    pythonList.style.display = 'none';
                    difficultList.style.display = 'block';
                    difficultList.classList.add('slide-right');
                    
                    setTimeout(() => {
                        difficultList.classList.remove('slide-right');
                        difficultList.classList.add('slide-center');
                    }, 50);
                }, 800);
            } else if (difficultList.style.display !== 'none') {
                difficultList.classList.remove('slide-center');
                difficultList.classList.add('slide-left');
                
                setTimeout(() => {
                    difficultList.style.display = 'none';
                    merciList.style.display = 'block';
                    merciList.classList.add('slide-right');
                    
                    setTimeout(() => {
                        merciList.classList.remove('slide-right');
                        merciList.classList.add('slide-center');
                        document.getElementById('nextArrow').classList.remove('visible');
                    }, 50);
                }, 800);
            }
        });

        document.getElementById('prevArrow').addEventListener('click', () => {
            const projectsList = document.getElementById('projectsList');
            const siteDynamique = document.getElementById('siteDynamique');
            const databaseList = document.getElementById('databaseList');
            const phpList = document.getElementById('phpList');
            const adminList = document.getElementById('adminList');
            const verificationPhpList = document.getElementById('verificationPhpList');
            const contactPageList = document.getElementById('contactPageList');
            const pythonList = document.getElementById('pythonList');
            const difficultList = document.getElementById('difficultList');
            const merciList = document.getElementById('merciList');

            if (merciList.style.display !== 'none') {
                merciList.classList.remove('slide-center');
                merciList.classList.add('slide-right');
                
                setTimeout(() => {
                    merciList.style.display = 'none';
                    difficultList.style.display = 'block';
                    difficultList.classList.add('slide-from-left');
                    document.getElementById('nextArrow').classList.add('visible');
                }, 800);
            } else if (difficultList.style.display !== 'none') {
                difficultList.classList.remove('slide-center');
                difficultList.classList.add('slide-right');
                
                setTimeout(() => {
                    difficultList.style.display = 'none';
                    pythonList.style.display = 'block';
                    pythonList.classList.add('slide-from-left');
                }, 800);
            } else if (pythonList.style.display !== 'none') {
                pythonList.classList.remove('slide-center');
                pythonList.classList.add('slide-right');
                
                setTimeout(() => {
                    pythonList.style.display = 'none';
                    contactPageList.style.display = 'block';
                    contactPageList.classList.add('slide-from-left');
                }, 800);
            } else if (contactPageList.style.display !== 'none') {
                contactPageList.classList.remove('slide-center');
                contactPageList.classList.add('slide-right');
                
                setTimeout(() => {
                    contactPageList.style.display = 'none';
                    verificationPhpList.style.display = 'block';
                    verificationPhpList.classList.add('slide-from-left');
                }, 800);
            } else if (verificationPhpList.style.display !== 'none') {
                verificationPhpList.classList.remove('slide-center');
                verificationPhpList.classList.add('slide-right');
                
                setTimeout(() => {
                    verificationPhpList.style.display = 'none';
                    adminList.style.display = 'block';
                    adminList.classList.add('slide-from-left');
                }, 800);
            } else if (adminList.style.display !== 'none') {
                adminList.classList.remove('slide-center');
                adminList.classList.add('slide-right');
                
                setTimeout(() => {
                    adminList.style.display = 'none';
                    phpList.style.display = 'block';
                    phpList.classList.add('slide-from-left');
                }, 800);
            } else if (phpList.style.display !== 'none') {
                phpList.classList.remove('slide-center');
                phpList.classList.add('slide-right');
                
                setTimeout(() => {
                    phpList.style.display = 'none';
                    databaseList.style.display = 'block';
                    databaseList.classList.add('slide-from-left');
                }, 800);
            } else if (databaseList.style.display !== 'none') {
                databaseList.classList.remove('slide-center');
                databaseList.classList.add('slide-right');
                
                setTimeout(() => {
                    databaseList.style.display = 'none';
                    siteDynamique.style.display = 'block';
                    siteDynamique.classList.add('slide-from-left');
                }, 800);
            } else if (siteDynamique.style.display !== 'none') {
                siteDynamique.classList.remove('slide-center');
                siteDynamique.classList.add('slide-right');
                
                setTimeout(() => {
                    siteDynamique.style.display = 'none';
                    projectsList.style.display = 'block';
                    projectsList.classList.add('slide-from-left');
                    document.getElementById('prevArrow').classList.remove('visible');
                    document.getElementById('nextArrow').classList.add('visible');
                }, 800);
            }
        });

        document.getElementById('mainTitle').addEventListener('click', () => {
            document.getElementById('contactForm').classList.remove('show');
            
            setTimeout(() => {
                document.getElementById('side-text').classList.remove('fly-away');
                document.querySelector('.projects-list').classList.remove('fly-away');
                document.querySelector('.projects-list').classList.remove('slide-left');
                document.querySelector('.projects-list').style.display = 'block';
            }, 500);
        });

        function openModal(img) {
            document.getElementById('imageModal').style.display = "block";
            document.getElementById('modalImage').src = img.src;
            document.getElementById('modalImage').style.transform = "translate(-50%, -50%) scale(1)";
            document.getElementById('modalImage').style.transition = "transform 0.3s ease-in-out";
        }

        function closeModal() {
            document.getElementById('modalImage').style.transform = "translate(-50%, -50%) scale(0.5)";
            setTimeout(() => {
                document.getElementById('imageModal').style.display = "none";
            }, 300);
        }

    </script>
</body>
</html>