<?php
require_once 'connection.php';
require_once 'class_film.php';

$film = null;

if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $filmObj = new film();
    $film = $filmObj->findbyid($_GET['id'], $pdo); 
}

include 'header.php';
?>

<h1><?= $film ? 'Modifier le' : 'Ajouter un' ?> film</h1>
<p>Veuillez remplir les informations ci-dessous.</p>

<div style="background-color: #222; padding: 25px; border-radius: 8px; border: 1px solid #444; max-width: 500px;">
    <form action="<?= $film ? 'film_modifier.php' : 'film_creer.php' ?>" method="post" enctype="multipart/form-data">
        
        <div style="margin-bottom: 15px;">
            <label for="titre" style="display: block; margin-bottom: 5px;">Titre :</label>
            <input type="text" id="titre" name="titre" value="<?= $film['titre'] ?? '' ?>" required style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #555; background-color: #333; color: white;">
        </div>
    
        <div style="margin-bottom: 15px;">
            <label for="genre" style="display: block; margin-bottom: 5px;">Genre :</label>
            <input type="text" id="genre" name="genre" value="<?= $film['genre'] ?? '' ?>" required style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #555; background-color: #333; color: white;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="date_sortie" style="display: block; margin-bottom: 5px;">Date de sortie :</label>
            <input type="text" id="date_sortie" name="date_sortie" value="<?= $film['date_sortie'] ?? '' ?>" required style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #555; background-color: #333; color: white;">
        </div>


        <div style="margin-bottom: 25px;">
            <label for="nom_photo" style="display: block; margin-bottom: 5px;">Photo :</label>
            <input type="file" id="nom_photo" name="nom_photo" style="color: #ccc;">
        </div>

        <div style="margin-bottom: 25px;">
            <label for="nom_photo" style="display: block; margin-bottom: 5px;">Photo :</label>
            
            <?php if ($film && !empty($film['nom_photo'])): ?>
                <div style="margin-bottom: 10px;">
                    <img src="uploads/<?= htmlspecialchars($film['nom_photo']) ?>" alt="Affiche actuelle" style="max-width: 150px; border-radius: 4px;">
                    <p style="font-size: 12px; color: #aaa;">Photo actuelle. Laissez vide pour la conserver.</p>
                </div>
                <input type="hidden" name="ancienne_photo" value="<?= htmlspecialchars($film['nom_photo']) ?>">
            <?php endif; ?>

            <input type="file" id="nom_photo" name="nom_photo" accept="image/*" style="color: #ccc;">
        </div>

        <input type="hidden" name="id" value="<?= $film['id_film'] ?? '' ?>">

        <div>
            <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px; font-size: 16px;">
                <?= $film ? 'Enregistrer' : 'Ajouter' ?>
            </button>
            
            <a href="film_list.php" style="margin-left: 10px; text-decoration: none;">
                <button type="button" style="background-color: #f44336; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px; font-size: 16px;">Annuler</button>
            </a>
        </div>
    </form>
</div>

<?php

include 'footer.php';
?>