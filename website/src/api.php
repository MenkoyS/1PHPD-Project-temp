<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['PMA_HOST']; 
$dbname = $_ENV['MYSQL_DATABASE'];
$username = $_ENV['MYSQL_USER'];
$databasePassword = $_ENV['MYSQL_PASSWORD'];
$apiPassword = $_ENV['API_PASSWORD']; 

function verifyPassword($password, $apiPassword) {
    return $password === $apiPassword;
}

try {
    if (!isset($_GET['table'])) {
        echo json_encode(array('error' => 'Veuillez fournir le nom de la table.'));
        exit;
    }
    
    $table = $_GET['table'];

    if ($table === 'users') {
        if (!isset($_GET['password'])) {
            echo json_encode(array('error' => 'Veuillez fournir le mot de passe.'));
            exit;
        }

        $password = $_GET['password'];
        
        if (!verifyPassword($password, $apiPassword)) {
            echo json_encode(array('error' => 'Mot de passe incorrect.'));
            exit;
        }

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $databasePassword);
    } else {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $databasePassword);
    }

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM $table");
    }

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        header('Content-Type: application/json');
        echo json_encode($result);
    } else {
        echo json_encode(array('error' => 'Aucune donnee trouvee.'));
    }
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Erreur lors de la connexion a la base de donnees : ' . $e->getMessage()));
}
?>
