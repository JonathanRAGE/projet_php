<?php
include 'connection.php';

class film {
    public $id_film;
    public $genre;
    public $date_sortie;
    public $titre;
    public $nom_photo;


    function __construct() {  
    }    // le mot clé $this faisant référence à l’objet est obligatoire
    public function get_id_film(){
        return $this->id_film;
    }
    public function set_id_film($id_film){
        $this->id_film = $id_film;
    }
    public function get_genre(){
        return $this->genre;
    }
    public function set_genre($genre){
        $this->genre = $genre;
    }
    public function get_date_sortie(){
        return $this->date_sortie;
    }
    public function set_date_sortie($date_sortie){
        $this->date_sortie = $date_sortie;
    }
    public function get_titre(){
        return $this->titre;
    }
    public function set_titre($titre){
        $this->titre = $titre;
    }
    public function findall($pdo, $start){
    $sql = "SELECT * FROM film ORDER BY genre ASC limit $start,3";
    return $pdo->query($sql)->fetchAll();
    }
    
    public function insert($pdo) {
        $sql = "INSERT INTO film (genre, date_sortie, titre) VALUES (:genre, :date_sortie, :titre)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':genre' => $this->genre,
            ':date_sortie' => $this->date_sortie,
            ':titre' => $this->titre,
        ]);
        return $pdo->lastInsertId();
    }
    public function findbyid($id, $pdo){
        $sql = "SELECT * FROM film WHERE id_filmget_id_film = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    public function update($id, $pdo){
        $sql = "UPDATE film SET genre = :genre, date_sortie = :date_sortie, titre = :titre WHERE id_filmget_id_film = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':genre' => $this->genre,
            ':date_sortie' => $this->date_sortie,
            ':titre' => $this->titre,
            ':id' => $id,
        ]);
    }
    public function delete($id, $pdo){
        $sql = "DELETE FROM film WHERE id_film = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>
