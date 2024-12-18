<?php
session_start();
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $db = new PDO('mysql:host=localhost;dbname=bedflix', 'root', '');
    $query = $db->prepare('SELECT * FROM utilisateurs WHERE email_utilisateur = ?');
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $db->prepare('SELECT * FROM UTILISATEURS WHERE email_utilisateur = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mot_de_passe_utilisateur'])) {
            $message = "Connexion réussie ! Bienvenue, " . htmlspecialchars($user['pseudo_utilisateur']) . ".";
            $_SESSION['pseudo_utilisateur'] = $user['pseudo_utilisateur'];
        } else {
            $message = "Email ou mot de passe incorrect.";
        }
    } elseif (isset($_POST['register'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = 2; 

        $stmt = $db->prepare('INSERT INTO UTILISATEURS (nom_utilisateur, prenom_utilisateur, email_utilisateur, pseudo_utilisateur, mot_de_passe_utilisateur, photo_profil_utilisateur, id_role) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$nom, $prenom, $email, $pseudo, $password, $photo, $role]);

        $message = "Compte créé avec succès. Vous pouvez maintenant vous connecter.";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion / Inscription</title>
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
            background-color:rgba(0, 123, 255, 0.25);
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
            <a href="series.php">Séries</a>
            <a href="films.php">Films</a>
            <!-- <a href="profil.php">Profil</a> -->
            <button class="btn" onclick="window.location.href='login.php';">Connexion/Compte</button>
        </div>
    </nav>
    <div class="content">
        <h1>Bienvenue sur Bedflix !</h1>
        <p>Découvrez nos séries et films originaux.</p>
    </div><body>
    <h1>Connexion</h1>
    <form method="POST" action="">
        <label for="email">Email :</label>
        <input type="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>
        <button type="submit" name="login">Se connecter</button>
    </form>

    <h2>Ou créez un compte</h2>
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required>
        <label for="email">Email :</label>
        <input type="email" name="email" required>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" required>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>
        <button type="submit" name="register">Créer un compte</button>
    </form>
    <?php
    echo $message;
    ?>
</body>
</html>