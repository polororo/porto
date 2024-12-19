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

        .projects-list {
            width: 80%;
            max-width: 1200px;
            margin: 40px auto;
            background: #0b0516;
            padding: 40px;
            color: #fff;
            font-family: 'Arial', sans-serif;
            opacity: 0;
            animation: fadeIn 1.5s ease-out forwards;
            animation-delay: 0.5s;
            border: 4px solid #45e8fd;
            border-radius: 75px;
            box-shadow: 0 0 15px #45e8fd,
                       0 0 30px #45e8fd;
            transition: all 0.8s ease;
        }

        .fly-away {
            transform: translateY(-200vh) !important;
            opacity: 0 !important;
        }

        @media (max-width: 768px) {
            .projects-list {
                width: 90%;
                padding: 20px;
                border-radius: 40px;
            }
        }

        @media (max-width: 480px) {
            .projects-list {
                width: 95%;
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
    <?php
    $conn = new PDO("mysql:host=localhost;dbname=dbd;charset=utf8", "root", "root");
    $im1 = $conn->prepare("SELECT * FROM baobab");
    $im1->execute();
    $results = $im1->fetchAll(PDO::FETCH_ASSOC);
    // print_r($results[3]['img']);
    // print_r($results['img']);
   ?>


    <div class="side-text" id="side-text">Loann Ordvpn</div>
    <div class="cursor"></div>
    <a href="#" class="contact-text" id="contact-btn">Contact</a>
    <button class="title" id="mainTitle">CyberFolio</button>
    <div class="loader-container" id="loader">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
    </div>

    <!-- <div id="mainContent" class="hidden"> -->
    <div id="mainContent" class="">
        <div class="projects-list">
            <h3>Projets</h3>
            <ul>
                <?php
                    foreach($results as $row) {
                ?>
                <div class="project-item">
                    <h4><?= $row['titre'] ?></h4>
                    <img src="<?= $row['img'] ?>" alt="Mars Exploration">
                    <p><?= $row['des'] ?></p>
                </div>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>


    <div class="contact-form" id="contactForm">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $conn = new PDO("mysql:host=localhost;dbname=dbd", "root", "root");
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
                $python_script = "python3 send_email.py";
                exec($python_script);


                echo "<p style='color: #45e8fd; text-align: center; margin-bottom: 20px;'>Message envoyé avec succès!</p>";
            } catch(PDOException $e) {
                echo "<p style='color: #ff04ff; text-align: center; margin-bottom: 20px;'>Erreur: " . $e->getMessage() . "</p>";
            }
        }
        ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            
            <div class="form-group">
                <label for="mail">Email</label>
                <input type="email" id="mail" name="mail" required>
            </div>
            
            <div class="form-group">
                <label for="sujet">Sujet</label>
                <input type="text" id="sujet" name="sujet" required>
            </div>
            
            <div class="form-group">
                <label for="msg">Message</label>
                <textarea id="msg" name="msg" required></textarea>
            </div>
            
            <div style="text-align: center;">
                <button type="submit" class="submit-btn">Envoyer</button>
            </div>
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
            document.getElementById('mainContent').classList.remove('hidden');
            document.getElementById('mainTitle').classList.add('visible');
            document.getElementById('contact-btn').classList.add('visible');
            document.getElementById('side-text').classList.add('visible');
        
        }, 2000);
        
        document.getElementById('contact-btn').addEventListener('click', (e) => {
            e.preventDefault();
            
            // Faire s'envoler tous les éléments
            document.getElementById('side-text').classList.add('fly-away');
            document.querySelector('.projects-list').classList.add('fly-away');
            
            // Afficher le formulaire de contact
            setTimeout(() => {
                document.getElementById('contactForm').classList.add('show');
            }, 500);
        });

        document.getElementById('mainTitle').addEventListener('click', () => {
            // Retirer la classe show du formulaire de contact
            document.getElementById('contactForm').classList.remove('show');
            
            // Retirer la classe fly-away des éléments
            setTimeout(() => {
                document.getElementById('side-text').classList.remove('fly-away');
                document.querySelector('.projects-list').classList.remove('fly-away');
            }, 500);
        });

    </script>
</body>
</html>