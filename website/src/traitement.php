<?php
$db_host = 'db';
$db_name = 'my_db';
$db_user = 'my_user';
$db_password = 'my_password';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if (strlen($password) < 8 || !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/", $password)) {
            echo "Le mot de passe doit contenir au moins 8 caractères avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial.";
            echo "<br><a href=\"index.php\">Retour au formulaire</a>";
            exit;
        }

        if ($password !== $confirmPassword) {
            echo "Les mots de passe ne correspondent pas!";
            echo "<br><a href=\"index.php\">Retour au formulaire</a>";
            exit;
        }

        try {
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            echo "Utilisateur enregistré avec succès!";
        } catch(PDOException $e) {
            echo "Erreur lors de l'enregistrement de l'utilisateur: " . $e->getMessage();
            echo "<br><a href=\"index.php\">Retour au formulaire</a>";
        }
    } else {
        echo "Tous les champs du formulaire sont obligatoires!";
        echo "<br><a href=\"index.php\">Retour au formulaire</a>";
    }
}
?>
