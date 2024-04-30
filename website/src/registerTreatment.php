<?php

require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginUsername']) && isset($_POST['loginPassword'])) {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $loginUsername]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "Utilisateur trouvé.<br>";

            if (password_verify($loginPassword, $user['password'])) {
                echo "Mot de passe correct.<br>";
                $_SESSION['username'] = $loginUsername;

                header("Location: index.php");
                exit;
            } else {
                echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
                echo "<br><a href=\"login-page.php\">Retour au formulaire de connexion</a>";
            }
        } else {
            echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
            echo "<br><a href=\"login-page.php\">Retour au formulaire de connexion</a>";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion à la base de données: " . $e->getMessage();
    }
} else {
    echo "Veuillez remplir tous les champs.";
    echo "<br><a href=\"login-page.php\">Retour au formulaire de connexion</a>";
}
?>
