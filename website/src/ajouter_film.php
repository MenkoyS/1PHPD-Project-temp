<?php
require_once 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeeklyMotion - Movie add</title>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <nav>
        <ul>
            <?php if (isset($_SESSION['username'])) : ?>
                <li><a href="#">Welcome, <?php echo $_SESSION['username']; ?></a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="ajouter_film.php">Add Movie</a></li>
            <?php else : ?>
                <li><a href="login-page.php">Register</a></li>
                <li><a href="login-page.php">Login</a></li>
            <?php endif; ?>
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Genre <i class="fa fa-angle-down"></i></a>
                <div class="dropdown-content">
                    <a href="./action.php">Action</a>
                    <a href="./drama.php">Drama</a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="addFilm">
        <form action="traiter_ajout_film.php" method="post" onsubmit="return validateForm()">
            <h2>Ajouter un film</h2>
            <label for="genre">Genre :</label>
            <select name="genre" id="genre" required>
                <option value="">Choisir un genre</option>
                <option value="action">Action</option>
                <option value="drama">Drame</option>
            </select>
            <label for="image">Lien de l'image :</label>
            <input type="url" id="image" name="image" placeholder="Entrez le lien de l'image" required>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" placeholder="Entrez le titre du film" required>
            <label for="description">Description :</label><br>
            <textarea id="description" name="description" placeholder="Entrez la description du film" required></textarea> <br>
            <label for="realisateur">Réalisateur :</label>
            <input type="text" id="realisateur" name="realisateur" placeholder="Entrez le nom du réalisateur" required>
            <label for="auteurs">Auteurs :</label>
            <div class="tags" id="tagsContainer"></div>
            <input type="hidden" id="auteursHidden" name="auteurs" value="">
            <input type="text" id="auteursInput" placeholder="Entrez les noms des auteurs (appuyer sur entrée pour valider chaque nom d'auteur)" onkeydown="addTag(event)">
            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" placeholder="Entrez le prix du film" required><br><br>
            <input type="submit" value="Ajouter">
        </form>
    </div>


    <script src="./js/addFilm.js"></script>

</body>

</html>
