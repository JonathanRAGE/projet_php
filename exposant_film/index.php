<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Répertoire de films - Cinéma Eco</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(to bottom right, #000000, #1a1a1a, #2b2b2b);
            color: white;
            display: flex;
        }

        /* Menu latéral */
        .sidebar {
            width: 250px;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-right: 2px solid #444;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            text-align: center;
            font-size: 20px;
            border-bottom: 1px solid #555;
            padding-bottom: 10px;
        }

        .sidebar button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-size: 15px;
        }

        .sidebar button:hover {
            background-color: #555;
        }

        /* Contenu principal */
        .main-content {
            flex: 1;
            padding: 40px;
            text-align: center;
        }

        .main-content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 18px;
            color: #ccc;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Menu</h2>
        <button>Ajouter un film</button>
        <button>Supprimer un film</button>
        <button>Modifier un film</button>
        <button>Rechercher un film</button>
    </div>

    <div class="main-content">
        <h1>Répertoire de films du cinéma Eco</h1>
        <p>Bienvenue dans le système de gestion des films.</p>
    </div>

</body>
</html>