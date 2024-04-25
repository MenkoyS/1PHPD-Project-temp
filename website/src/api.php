<?php
$host = 'db';
$dbname = 'my_db';
$username = 'my_user';
$password = 'my_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['table']) && isset($_GET['id'])) {
        $table = $_GET['table'];
        $id = $_GET['id'];

        $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            echo json_encode(array('error' => 'Aucune donnée trouvée pour cet ID.'));
        }
    } else {
        echo json_encode(array('error' => 'Veuillez fournir à la fois le nom de la table et l\'ID.'));
    }
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Erreur lors de la connexion à la base de données : ' . $e->getMessage()));
}
?>
