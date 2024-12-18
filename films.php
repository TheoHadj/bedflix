<?php

$db = new PDO('mysql:host=localhost;dbname=bedflix', 'root', '');

$query = $db->prepare('SELECT * FROM films');
$query->execute();
$films = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM categories');
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);


session_start();




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categorie = $_POST['categorie'];
    // var_dump($_POST);
    // echo var_dump($categorie);
    if (isset($_POST['categorie'])) {
        if($_POST['categorie'] == "*"){            
            $query = $db->prepare('SELECT * FROM categories');
            $query->execute();
            $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else{

            $query = $db->prepare("
            SELECT films.* 
            FROM films 
            INNER JOIN films_categories ON films.id_film = films_categories.id_film 
            WHERE films_categories.id_categorie = :id_categorie
            ");
            $query->execute(['id_categorie' => $categorie]);
            $films = $query->fetchAll(PDO::FETCH_ASSOC);
        }
    
    }
}


?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        /* Styles de base */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #121212; /* Fond sombre */
            color: #f5f5f5; /* Texte clair pour contraste */
        }

        /* Barre de navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #1f1f1f; /* Couleur de fond de la navbar */
            color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
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

        /* Section principale */
        .content {
            padding: 20px;
        }

        main {
            max-width: 1200px;
            margin: auto;
            text-align: center;
        }

        h1 {
            margin-bottom: 30px;
        }

        .film-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .film-card {
            background-color: #1e1e1e; /* Fond sombre pour les cartes */
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.7);
            overflow: hidden;
        }

        .film-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .film-card h2 {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .film-card p {
            margin: 5px 0;
            font-size: 0.9em;
            color: #d3d3d3;
        }

        .film-card a.watch-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .film-card a.watch-btn:hover {
            background-color: #0056b3;
        }


        .filter-container {
            margin: 20px auto;
            padding: 15px;
            max-width: 800px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.7);
            text-align: center;
        }

        .filter-container h2 {
            margin-bottom: 15px;
            font-size: 1.5em;
            color: #f5f5f5;
        }

        .filter-container form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .filter-container select {
            padding: 10px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            background-color: #2b2b2b;
            color: #f5f5f5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s, color 0.3s;
        }

        .filter-container select:hover {
            background-color: #3a3a3a;
            color: #fff;
        }

        .filter-container button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .filter-container button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }




    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            Bedflix
        </div>
        <div class="menu">
            <img src="images/image.png">
            <p>Salut <?php echo $_SESSION['pseudo_utilisateur']?></p>
            <a href="series.php">Séries</a>
            <a href="films.php">Films</a>
            <button class="btn" onclick="window.location.href='login.php';">Connexion/Compte</button>
        </div>
    </nav>
    <div class="content">
    <main>
        <h1>Liste des Films</h1>
        
        <div class="filter-container">
            <h2>Filtrer par Catégories</h2>
            <form method="POST" >
                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie">
                        <option value="*"> Toutes catégories </option>
                        <?php foreach ($categories as $categorie): ?>
                            <option value=<?php echo htmlspecialchars($categorie['id_categorie'])?>><?php echo htmlspecialchars($categorie['libelle_categorie'])?></option>
                            <?php endforeach; ?>
                        </select>

                            
                    </div>
                    <button type="submit">Filtrer</button>

            </form>
        </div>
        
        
        
        <div class="film-gallery">
            <?php foreach ($films as $film): ?>
                <div class="film-card">
                    <img src="<?php echo "images/" . htmlspecialchars($film['affiche_film']); ?>" width="400" height="500" alt="Affiche du film">
                    <h2><?php echo htmlspecialchars($film['titre_film']); ?></h2>
                    <p><?php echo htmlspecialchars($film['description_film']); ?></p>
                    <p>Durée : <?php echo htmlspecialchars($film['duree_film']); ?> minutes</p>
                    <a href="<?php echo htmlspecialchars($film['lien_film']); ?>" target="_blank" class="watch-btn">Regarder</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    </div>
</body>
</html>