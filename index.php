<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
        }
        .navbar .logo {
            font-size: 1.5em;
            font-weight: bold;
        }
        .navbar a {
            text-decoration: none;
            color: #fff;
            margin: 0 10px;
            transition: color 0.3s;
        }
        .navbar a:hover {
            color: #ddd;
        }
        .navbar .menu {
            display: flex;
            align-items: center;
        }
        .navbar .btn {
            background-color: #007BFF;
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }
        .navbar .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            Bedflix
        </div>
        <div class="menu">
            <!-- <a href="index.php">Accueil</a> -->
            <a href="series.php">Séries</a>
            <a href="films.php">Films</a>
            <!-- <a href="profil.php">Profil</a> -->
            <button class="btn" onclick="window.location.href='login.php';">Connexion/Compte</button>
        </div>
    </nav>
    <div class="content">
        <h1>Bienvenue sur Bedflix !</h1>
    </div>
</body>
</html>
