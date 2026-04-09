<?php

require_once 'connection.php';
require_once 'class_film.php'; 

$film = new film(); 


$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$films = $film->findall($pdo, $start);

include 'header.php'; 
?>

<h1>Affiche de films</h1>
<p>Bienvenue dans le système de gestion des films.</p>

<label for="barreRecherche"><strong>Rechercher :</strong></label>
<input type="text" id="barreRecherche" placeholder="Tapez le début du titre...">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Année</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="resultatsFilms">
        <?php foreach ($films as $j): ?>
            <tr>
                <td><?= $j['id_film'] ?></td>
                <td><?= htmlspecialchars($j['titre']) ?></td>
                <td><?= htmlspecialchars($j['date_sortie']) ?></td>
                <td><?= htmlspecialchars($j['genre']) ?></td>
                <td>
                    <a href="film_form.php?action=edit&id=<?= $j['id_film'] ?>">Modifier</a> |
                    <a href="film_supprimer.php?id=<?= $j['id_film'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film ?');" style="color: #ff6666;">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: center;">
                <?php if ($start > 0): ?>
                    <a href="film_list.php?start=<?= $start - 3 ?>">&laquo; Précédent</a>
                    &nbsp; | &nbsp;
                <?php endif; ?>
                <a href="film_list.php?start=<?= $start + 3 ?>">Suivant &raquo;</a>
            </td>
        </tr>
    </tfoot>
</table>

<script>
    const barre = document.getElementById('barreRecherche');
    const zoneResultats = document.getElementById('resultatsFilms');

    barre.addEventListener('input', function() {
        let texte = this.value;

        if (texte.length > 0) {
            fetch('recherche.php?q=' + encodeURIComponent(texte))
                .then(response => response.text())
                .then(html => {
                    zoneResultats.innerHTML = html;
                });
        } else {
            window.location.reload();
        }
    });
</script>

<?php 
// Et on ferme la page avec le footer
include 'footer.php'; 
?>