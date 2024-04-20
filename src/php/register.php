<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connexion = new mysqli("localhost", "root", "1PHPggbg", "1PHP");

    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    } else {
        echo "Connexion réussie à la base de données !<br>";
    }

    $username = $_POST['username'];
    $password_temp = $_POST['password'];
    $email = $_POST['email'];

    echo "Nom d'utilisateur : " . $username . "<br>";
    echo "Mot de passe : " . $password_temp . "<br>";
    echo "Email : " . $email . "<br>";

    $password = password_hash($password_temp, PASSWORD_DEFAULT);

    function getEmailCount($connexion) {
        $result = $connexion->query("SELECT COUNT(*) as count FROM users");
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    $emailCount = getEmailCount($connexion);

    $nextId = $emailCount + 1;

    $requete = $connexion->prepare("INSERT INTO users (id, username, password_hash, email) VALUES (?, ?, ?, ?)");
    $requete->bind_param("isss", $nextId, $username, $password, $email);

    if ($requete->execute()) {
        echo "Inscription réussie !<br>";
    } else {
        echo "Erreur lors de l'inscription : " . $requete->error;
    }

    $connexion->close();
}
?>