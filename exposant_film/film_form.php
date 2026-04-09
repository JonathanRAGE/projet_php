<doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Joueur Form</title>
        <?php
        include 'connection.php';
        include 'class_film.php';
        $film = null;
        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $filmObj = new film();
            $film = $filmObj->findById($_GET['id'], $pdo);
        }
        ?>
        <body>
            <h1><?= $film ? 'Modifier' : 'Créer' ?> film</h1>
            <form action="<?= $film ? 'film_modifier.php' : 'film_creer.php' ?>" method="post" enctype="multipart/form-data">
                <label for="genre">genre</label>
                <input type="text" id="titre" name="titre" value="<?= $film['titre'] ?? '' ?>" required><br><br>

                <label for="annee">année:</label>
                <input type="number" id="annee" name="annee" value="<?= $film['annee'] ?? '' ?>" required><br><br>

                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" value="<?= $film['titre'] ?? '' ?>" required><br><br>

                <label for="nom_photo">Photo:</label>
                <input type="file" id="nom_photo" name="nom_photo"><br><br>

                <input type="hidden" name="id" value="<?= $film['id_film'] ?? '' ?>">

                <button type="submit"><?= $film ? 'Enregistrer' : 'Créer' ?></button>
                <a href="film_list.php">
                    <button type="button">Annuler</button>
                </a>
            </form>
        </body>
    </head>
</html>