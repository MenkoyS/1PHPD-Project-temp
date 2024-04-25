<?php
$host = 'db';
$dbname = 'my_db';
$username = 'my_user';
$password = 'my_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['table'])) {
        $table = $_GET['table'];
        $stmt = null;

        if (isset($_GET['id'])) {   
            $id = $_GET['id'];
            $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = :id");
            $stmt->bindParam(':id', $id);
        } else {
            $stmt = $pdo->query("SELECT * FROM $table");
        }

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($results);
    } else {
        echo "Veuillez fournir le nom de la table dans l'URL.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
}
