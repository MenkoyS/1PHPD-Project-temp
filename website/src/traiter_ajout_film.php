<?php
require_once 'db_connect.php';

try {
    $genre = $_POST['genre'];
    $image_link = $_POST['image'];
    $title = $_POST['titre'];
    $director = $_POST['realisateur'];
    $actors = $_POST['auteurs'];
    $description = $_POST['description']; 

    $stmt = $pdo->prepare("INSERT INTO film (genre, image_link, title, description, director, actors) VALUES (:genre, :image_link, :title, :description, :director, :actors)");

    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':image_link', $image_link);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':director', $director);
    $stmt->bindParam(':actors', $actors);

    $stmt->execute();

    echo "Film ajouté avec succès !";
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du film : " . $e->getMessage();
}
?>
