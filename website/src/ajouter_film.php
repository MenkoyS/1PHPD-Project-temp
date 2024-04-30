<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeeklyMotion - Movie add</title>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>

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
        <label for="realisateur">Réalisateur :</label>
        <input type="text" id="realisateur" name="realisateur" placeholder="Entrez le nom du réalisateur" required>
        <label for="auteurs">Auteurs :</label>
        <div class="tags" id="tagsContainer"></div>
        <input type="hidden" id="auteursHidden" name="auteurs" value="">
        <input type="text" id="auteursInput" placeholder="Entrez les noms des auteurs (appuyer sur entrée pour valider chaque nom d'auteur)" onkeydown="addTag(event)">
        <input type="submit" value="Ajouter">
    </form>


    <script src="./js/addFilm.js"></script>

</body>

</html>