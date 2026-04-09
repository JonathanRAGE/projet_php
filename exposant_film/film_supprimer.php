<?php
include 'connection.php';   
include 'class_film.php';
$film = new film();
$id = $_GET['id'];
$film->delete($id, $pdo);
header('Location: film_list.php');
exit;
?>