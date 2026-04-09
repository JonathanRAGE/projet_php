<?php
require_once 'connection.php';
require_once 'class_film.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filmModifie = new film();
    $filmModifie->genre = $_POST['genre'];
    $filmModifie->date_sortie = $_POST['date_sortie'];
    $filmModifie->titre = $_POST['titre'];
    $id = $_POST['id'];

   
    $nom_fichier = $_POST['ancienne_photo'] ?? ""

    if (isset($_FILES['nom_photo']) && $_FILES['nom_photo']['error'] == 0) {
        
        $nom_fichier = time() . '_' . basename($_FILES['nom_photo']['name']);
        $chemin_destination = 'uploads/' . $nom_fichier;
        move_uploaded_file($_FILES['nom_photo']['tmp_name'], $chemin_destination);
    }
    
    $filmModifie->nom_photo = $nom_fichier;

 
    $filmModifie->update($id, $pdo);
    
    header("Location: film_list.php");
    exit();
}
?>