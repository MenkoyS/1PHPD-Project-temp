<?php

require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];

    if (empty($username) || empty($password) || empty($confirmPassword) || empty($email)) {
        echo "Veuillez remplir tous les champs.";
        echo "<br><a href=\"login-page.php\">Retour au formulaire d'inscription</a>";
        exit;
    }

    if (strlen($password) < 8 || !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/", $password)) {
        echo "Le mot de passe doit contenir au moins 8 caractères avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial.";
        echo "<br><a href=\"login-page.php\">Retour au formulaire d'inscription</a>";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "Les mots de passe ne correspondent pas!";
        echo "<br><a href=\"login-page.php\">Retour au formulaire d'inscription</a>";
        exit;
    }

    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;
    } catch(PDOException $e) {
        echo "Erreur lors de l'enregistrement de l'utilisateur: " . $e->getMessage();
        echo "<br><a href=\"login-page.php\">Retour au formulaire d'inscription</a>";
    }
} else {
    echo "Veuillez remplir tous les champs.";
    echo "<br><a href=\"login-page.php\">Retour au formulaire d'inscription</a>";
}
?>
