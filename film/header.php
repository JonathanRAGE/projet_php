<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cinéma Eco</title>
    <style> * {
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

        .sidebar a.btn-menu {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-size: 15px;
            text-align: center;
            text-decoration: none;
        }

        .sidebar a.btn-menu:hover {
            background-color: #555;
        }

        
        .main-content {
            flex: 1;
            padding: 40px;
            
            overflow-y: auto;
        }

        .main-content h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .main-content p {
            font-size: 18px;
            color: #ccc;
            margin-bottom: 30px;
        }

      
        input[type="text"] {
            padding: 10px;
            width: 300px;
            background-color: #222;
            color: white;
            border: 1px solid #555;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.05);
        }

        th, td {
            padding: 12px;
            border: 1px solid #444;
            text-align: left;
        }

        th {
            background-color: #333;
        }

        a {
            color: #4da6ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Cinema ECO</h2>
        <a href="film_list.php" class="btn-menu">Liste des films</a>
        <a href="film_form.php?action=new" class="btn-menu">Ajouter un film</a>
    </div>
    <div class="main-content">