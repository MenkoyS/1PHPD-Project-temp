<?php
require_once 'db_connect.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM film WHERE genre = 'Action'");
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching action films: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weeklymotion - Action</title>
    <link rel="stylesheet" href="./css/category.css">
</head>

<body>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Genre <i class="fa fa-angle-down"></i></a>
                <div class="dropdown-content">
                    <a href="./action.php">Action</a>
                    <a href="./drama.php">Drama</a>
                </div>
            </li>
        </ul>
    </nav>
    <h1>Action Films</h1>
    <div class="posters">
        <?php foreach ($films as $film) : ?>
            <div class="poster">
                <img src="<?php echo $film['image_link']; ?>" alt="<?php echo $film['title']; ?>">
                <p><?php echo $film['title']; ?></p>
                <p><?php echo $film['director']; ?></p>
                <p><?php echo $film['actors']; ?></p>
                <p><?php echo $film['price'] . "€"; ?></p>
                <button><a href="movie-info.php?id=<?php echo $film['id']; ?>">View more</a></button>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>