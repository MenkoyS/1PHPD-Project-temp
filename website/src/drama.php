<?php
require_once 'db_connect.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM film WHERE genre = 'Drama'");
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching drama films: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drama Films</title>
    <link rel="stylesheet" href="./css/category.css">
</head>
<body>

<nav>
        <ul>
            <?php if (isset($_SESSION['username'])) : ?>
                <li><a href="#">Welcome, <?php echo $_SESSION['username']; ?></a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="ajouter_film.php">Add Movie</a></li>
            <?php else : ?>
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
    <h1>Drama Films</h1>
    <div class="posters">
        <?php foreach ($films as $film) : ?>
            <div class="poster">
                <img src="<?php echo $film['image_link']; ?>" alt="<?php echo $film['title']; ?>">
                <p><?php echo $film['title']; ?></p>
                <p><?php echo $film['director']; ?></p>
                <p><?php echo $film['actors']; ?></p>
                <p><?php echo $film['price'] . "€" ; ?></p>
                <button><a href="movie-info.php?id=<?php echo $film['id']; ?>">View more</a></button>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
