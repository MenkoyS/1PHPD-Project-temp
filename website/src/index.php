<?php
require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeeklyMotion</title>
    <link rel="stylesheet" href="./css/homepage.css">
</head>

<body>

    <nav>
        <ul>
            <?php if (isset($_SESSION['username'])) : ?>
                <li><a href="#">Welcome, <?php echo $_SESSION['username']; ?></a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="cart.php">Cart</a></li>
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

    <h1>Welcome to WeeklyMotion</h1>
    <p>Your number one source for the latest movie posters</p>

    <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search">
    </form>
    <h2>Check out our latest posters</h2>
    <div class="posters">
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM film ORDER BY id DESC LIMIT 3");
            $posters = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($posters as $poster) {
                echo '<div class="poster">';
                echo '<img src="' . $poster['image_link'] . '" alt="' . $poster['title'] . '" >';
                echo '<p>Author: ' . $poster['director'] . '</p>';
                echo '<button><a href="movie-info.php?id=' . $poster['id'] . '">View more</a></button>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Error fetching posters: " . $e->getMessage();
        }
        ?>
    </div>

</body>

</html>
