<?php
$host = 'db'; 
$dbname = 'my_db';
$username = 'my_user'; 
$password = 'my_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $genre = $_POST['genre'];
    $image_link = $_POST['image'];
    $title = $_POST['titre'];
    $director = $_POST['realisateur'];
    $actors = $_POST['auteurs'];

    $stmt = $pdo->prepare("INSERT INTO film (genre, image_link, title, director, actors) VALUES (:genre, :image_link, :title, :director, :actors)");

    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':image_link', $image_link);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':director', $director);
    $stmt->bindParam(':actors', $actors);

    $stmt->execute();

    echo "Film ajouté avec succès !";
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du film : " . $e->getMessage();
}
?>
