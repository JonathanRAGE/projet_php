<html>
    <head>
        <title>Liste des Films</title>
    </head>
    <body>
<?php
include 'connection.php';
include 'class_film.php'; 
$film = new film(); 
$start=0;
$films = $film->findAll($pdo,$start);

?>    
        <h1>Liste des films</h1>
        <a href="film_form.php?action=new&">Ajouter un nouveau film</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Réalisateur</th>
                    <th>Actions</th>
                </tr>
            </thread>
            <tbody>
                <?php foreach ($films as $j): ?>
                    <tr>
                        <td><?= $j['id_film'] ?></td>
                        <td><?= $j['titre'] ?></td>
                        <td><?= $j['annee'] ?></td>
                        <td><?= $j['realisateur'] ?></td>
                        <td>
                            <a href="film_form.php?action=edit&id=<?= $j['id_film'] ?>">Modifier</a>
                            <a href="film_supprimer.php?id=<?= $j['id_film'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfooter>
                <tr>
                    <td colspan="5">
                        <a href="film_list.php?start=<?= max(0, $start - 3) ?>">Précédent</a>
                        |
                        <a href="film_list.php?start=<?= $start + 3 ?>">Suivant</a>
                    </td>
                </tr>
                </tfooter>
            </tbody>
        </table>       
    </body>
</html>