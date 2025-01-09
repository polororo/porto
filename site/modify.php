<?php
$id = $_GET['id'];
$conn = new PDO("mysql:host=localhost;dbname=Cyberfolio;charset=utf8", "root", "root");

if(isset($_POST['send'])){
    if(isset($_POST['titre']) && isset($_POST['des']) && 
       $_POST['titre'] != "" && $_POST['des'] != ""){

        $titre = $_POST['titre'];
        $des = $_POST['des'];

        // Gestion de l'image si une nouvelle est téléchargée
        if(!empty($_FILES['image_file']['name'])){
            // Récupérer l'ancienne image
            $stmt = $conn->prepare("SELECT img FROM baobab WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $old_image = $stmt->fetchColumn();
            
            // Supprimer l'ancienne image si elle existe
            if($old_image && file_exists("C:/UwAmp/www/site/" . $old_image)) {
                unlink("C:/UwAmp/www/site/" . $old_image);
            }

            $file_basename = pathinfo($_FILES['image_file']['name'], PATHINFO_FILENAME);
            $file_extension = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
            $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;
            
            $target_directory = "C:/UwAmp/www/site/";
            $target_path = $target_directory . $new_image_name;
            
            if(move_uploaded_file($_FILES['image_file']['tmp_name'], $target_path)){
                $stmt = $conn->prepare("UPDATE baobab SET titre = :titre, des = :des, img = :img WHERE id = :id");
                $stmt->execute([
                    ':titre' => $titre,
                    ':des' => $des,
                    ':img' => $new_image_name,
                    ':id' => $id
                ]);
            }
        } else {
            $stmt = $conn->prepare("UPDATE baobab SET titre = :titre, des = :des WHERE id = :id");
            $stmt->execute([
                ':titre' => $titre,
                ':des' => $des,
                ':id' => $id
            ]);
        }
        
        header("Location: dashboard.php#projects");
        exit();
    } else {
        header("Location: dashboard.php?message=emptyfiles#projects");
        exit();
    }
}
?>