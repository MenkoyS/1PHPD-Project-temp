<?php
$host = 'db'; 
$dbname = 'my_db';
$username = 'my_user'; 
$password = 'my_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $filmId = 1;

    $stmt = $pdo->prepare("SELECT * FROM film WHERE id = :filmId");
    $stmt->bindParam(':filmId', $filmId);
    $stmt->execute();
    $film = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($film) {
        echo "Genre: " . $film['genre'] . "<br>";
        echo "Image: <img src='" . $film['image_link'] . "' alt='Image du film' style='max-width: 200px; max-height: 200px;'>" . "<br>";
        echo "Titre: " . $film['title'] . "<br>";
        echo "Réalisateur: " . $film['director'] . "<br>";
        echo "Lien Réalisateur: " . $film['director_link'] . "<br>";
        echo "Acteurs: " . $film['actors'] . "<br>";
        echo "Price : " . $film['price'] . "<br>";
    } else {
        echo "Film non trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération du film : " . $e->getMessage();
}
?>
