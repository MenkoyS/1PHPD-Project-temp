<?php
require_once 'db_connect.php';

try {
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
