<?php
require_once 'db_connect.php';

header("refresh:3;url=index.php");

if (isset($_SESSION['username'])) {
    session_unset();
    session_destroy();
    echo "Vous avez été déconnecté avec succès. Vous allez être redirigé vers l'accueil dans quelques secondes...";
} else {
    echo "Vous n'êtes pas connecté.";
}

exit; 
?>
