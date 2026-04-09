<?php
//print_r($_POST);
include 'connection.php';
include 'class_film.php'; 
$film = new film(); 
$film->titre = $_POST['titre'];
$film->annee = $_POST['annee'];
$film->realisateur = $_POST['realisateur'];
$film->nom_photo = null;
//insertion du nouveau film : appel de la méthode insert
$id_film_nouveau = $film->insert($pdo);
//Gestion de l'upload de la photo
if (isset($_FILES['nom_photo']) && $_FILES['nom_photo']['error'] ==0) {
    $tmp_name = $_FILES['nom_photo']['tmp_name'];
    $original_name = basename($_FILES['nom_photo']['name']);
    $extension =pathinfo($original_name, PATHINFO_EXTENSION);
    $new_name = 'photo_'.$id_joueur_nouveau.'.'.$extension;
    move_uploaded_file($tmp_name, './photo/'.$new_name); 
        // Mettre à jour le nom de la photo dans la base de données
        $sql = "UPDATE film SET nom_photo = :nom_photo WHERE id_film = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom_photo' =>$new_name,
            ':id' => $id_film_nouveau
         ]);
}

//redirection vers la liste des films

header('Location: film_list.php');
exit;
?>
