<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un film</title>
    <link rel="stylesheet" href="form.css">
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


    <script>
        function addTag(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                var auteursInput = document.getElementById("auteursInput");
                var tagsContainer = document.getElementById("tagsContainer");
                var auteursHidden = document.getElementById("auteursHidden");

                var auteur = auteursInput.value.trim();
                if (auteur !== "") {
                    var tag = document.createElement("div");
                    tag.classList.add("tag");
                    tag.innerHTML = "<span>" + auteur + "</span><button onclick='removeTag(this)'>X</button>";
                    tagsContainer.appendChild(tag);

                    if (auteursHidden.value !== "") {
                        auteursHidden.value += ",";
                    }
                    auteursHidden.value += auteur;

                    auteursInput.value = "";
                }
            }
        }

        function removeTag(tag) {
            var tagsContainer = document.getElementById("tagsContainer");
            var auteursHidden = document.getElementById("auteursHidden");

            tagsContainer.removeChild(tag.parentNode);

            var auteur = tag.previousSibling.textContent.trim();
            var auteurs = auteursHidden.value.split(",");
            var index = auteurs.indexOf(auteur);
            if (index !== -1) {
                auteurs.splice(index, 1);
                auteursHidden.value = auteurs.join(",");
            }
        }

        function validateForm() {
            var genre = document.getElementById("genre").value;
            var image = document.getElementById("image").value;
            var titre = document.getElementById("titre").value;
            var realisateur = document.getElementById("realisateur").value;
            var auteurs = document.getElementById("auteursHidden").value;

            if (genre === "" || image === "" || titre === "" || realisateur === "" || auteurs === "") {
                alert("Veuillez remplir tous les champs obligatoires.");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>