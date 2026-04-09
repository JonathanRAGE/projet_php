<?php
include 'connection.php';
include 'class_film.php';

if (isset($_GET['q'])) {
    $film = new film();
    $resultats = $film->search_by_title($_GET['q'], $pdo);

    if (count($resultats) > 0) {
        foreach ($resultats as $j) {
            echo "<tr>";
            echo "<td>" . $j['id_film'] . "</td>";
            echo "<td>" . $j['titre'] . "</td>";
            echo "<td>" . $j['date_sortie'] . "</td>";
            echo "<td>" . $j['genre'] . "</td>";
            echo "<td>
                    <a href='film_form.php?action=edit&id=" . $j['id_film'] . "'>Modifier</a>
                    <a href='film_supprimer.php?id=" . $j['id_film'] . "' onclick=\"return confirm('Êtes-vous sûr ?');\">Supprimer</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Aucun film trouvé avec ces lettres.</td></tr>";
    }
}
?>