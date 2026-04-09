<?php
include 'connection.php';   
include 'class_film.php';
$film = new film();
$id = $_POST['id'];
$film->titre= $_POST['titre'];
$film->annee= $_POST['annee'];
$film->realisateur= $_POST['realisateur'];
$film->update($id, $pdo);
header('Location: film_list.php');
exit;
?>