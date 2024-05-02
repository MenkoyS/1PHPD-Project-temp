<?php
require_once 'db_connect.php';

$id = $_GET['id'] ?? null;
$message = '';

if (!$id) {
    $message = "ID not provided.";
} else {
    try {
        $stmt = $pdo->prepare("SELECT * FROM film WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $film = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$film) {
            $message = "Film not found.";
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username'])) {
                try {
                    $stmt = $pdo->prepare("UPDATE film SET in_cart = 1 WHERE id = :id");
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();

                    $message = "Film ajouté au panier avec succès !";
                } catch (PDOException $e) {
                    $message = "Erreur : Le film n'a pas été ajouté au panier : " . $e->getMessage();
                }
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['username'])) {
                $message = "Vous devez être connecté pour ajouter un élément au panier.";
            }
        }
    } catch (PDOException $e) {
        $message = "Error fetching film: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/movie-info.css">
    <title>Weeklymotion - Movie Information</title>
</head>

<body>
    <nav>
        <ul>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="#">Welcome, <?php echo $_SESSION['username']; ?></a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="ajouter_film.php">Add Movie</a></li>
            <?php else: ?>
                <li><a href="login-page.php">Register</a></li>
                <li><a href="login-page.php">Login</a></li>
            <?php endif; ?>
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Genre <i class="fa fa-angle-down"></i></a>
                <div class="dropdown-content">
                    <a href="./action.php">Action</a>
                    <a href="./drama.php">Drama</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="divcenter">
        <h1><?php echo $film['title']; ?></h1>
        <img src="<?php echo $film['image_link']; ?>" alt="Film poster" draggable="False">
        <h2>Description :</h2>
        <h3><?php echo $film['description']; ?></h3>
        <h2>Director :</h2>
        <h3><?php echo $film['director']; ?></h3>
        <h2>Actors :</h2>
        <h3><?php echo $film['actors']; ?></h3>
        <h2>Price : <?php echo $film['price']; ?> $</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $film['id']; ?>">
            <button type="submit">
                <span class="transition"></span>
                <span class="gradient"></span>
                <span class="label">Add to cart</span>
            </button>
        </form>
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
    </div>
    <div>
        <h2>Director's other films :</h2>
        <div class="posters">
            <?php
            $count = 0;
            try {
                $director = $_GET['director'];
                $stmt = $pdo->prepare("SELECT * FROM film WHERE director = :director");
                $stmt->bindParam(':director', $director);
                $stmt->execute();
                $posters = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($posters as $poster) {
                    if ($count % 3 == 0 && $count != 0) {
                        echo '</div><div class="posters">';
                    }
                    echo '<div class="poster">';
                    echo '<a href="movie-info.php?id=' . $poster['id'] . '&director=' . $poster['director'] .'"><img src="' . $poster['image_link'] . '" alt="' . $poster['title'] . '" </a>';
                    echo '<h2><a href="movie-info.php?id=' . $poster['id'] . '&director=' . $poster['director'] .'">' . $poster['title'] . '</a></h2>';
                    echo '<h3>Director : ' . $poster['director'] . '</h3>';
                    echo '<button><a href="movie-info.php?id=' . $poster['id'] . '&director=' . $poster['director'] . '">View more</a></button>';
                    echo '</div>';
                    $count++;
                }
            } catch (PDOException $e) {
                echo "Error fetching posters: " . $e->getMessage();
            }
            ?>
        </div>
    </div>
    <footer>
        <div class="imgFooter">
            <a href="https://youtube.com" target="_blank"><img src="./css/assets/youtube.png"
                    alt="Youtube Weeklymotion"></a>
            <a href="https://instagram.com" target="_blank"><img src="./css/assets/insta.png"
                    alt="Instagram Weeklymotion"></a>
            <a href="https://facebook.com" target="_blank"><img src="./css/assets/facebook.png"
                    alt="Facebook Weeklymotion"></a>
            <a href="https://twitter.com" target="_blank"><img src="./css/assets/twitter.png"
                    alt="Twitter Weeklymotion"></a>
        </div>
        <div class="txtFooter">
            <p>© 2024 Weeklymotion</p>
        </div>
    </footer>
</body>

</html>
