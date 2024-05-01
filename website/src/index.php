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

    <h1>Welcome to WeeklyMotion</h1>
    <p>Your number one source for the latest movie posters</p>
    <div class="searchbardiv">
        <div class="search-container">
            <form method="GET">
                <input type="text" class="searchbar" name="research" placeholder="Search by title or director">
            </form>
        </div>
    </div>
    <?php
    if(isset($_GET['research']) AND !empty($_GET['research'])){
        ?><h2>Your research result :</h2><?php
    }
    ?>
    <div class="posters">
        <?php
        $request = NULL;
        $count = 0;
        if(isset($_GET['research']) AND !empty($_GET['research'])){
            $search = htmlspecialchars($_GET['research']);
            $request = $pdo->query('SELECT * FROM film WHERE title LIKE "%'.$search.'%" OR director LIKE "%'.$search.'%" ORDER BY id');
            while($result = $request->fetch()){
                if ($count % 3 == 0 && $count != 0) {
                    echo '</div><div class="posters">';
                }
                echo '<div class="poster">';
                echo '<a href="movie-info.php?id=' . $result['id'] . '&director=' . $result['director'] .'"><img src="' . $result['image_link'] . '" alt="' . $result['title'] . '" </a>';
                echo '<h2><a href="movie-info.php?id=' . $result['id'] . '&director=' . $result['director'] .'">' . $result['title'] . '</a></h2>';
                echo '<h3>Director : ' . $result['director'] . '</h3>';
                echo '<button><a href="movie-info.php?id=' . $result['id'] . '&director=' . $result['director'] .'">View more</a></button>';
                echo '</div>';
                $count++;
            }
        }
        ?>
    </div>
    <h2>Check out our latest posters</h2>
    <div class="posters">
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM film ORDER BY id DESC LIMIT 3");
            $posters = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($posters as $poster) {
                echo '<div class="poster">';
                echo '<a href="movie-info.php?id=' . $poster['id'] . '&director=' . $poster['director'] .'"><img src="' . $poster['image_link'] . '" alt="' . $poster['title'] . '" </a>';
                echo '<h2><a href="movie-info.php?id=' . $poster['id'] . '&director=' . $poster['director'] .'">' . $poster['title'] . '</a></h2>';
                echo '<h3>Director : ' . $poster['director'] . '</h3>';
                echo '<button><a href="movie-info.php?id=' . $poster['id'] . '&director=' . $poster['director'] . '">View more</a></button>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Error fetching posters: " . $e->getMessage();
        }
        ?>
    </div>
    <footer>
        <div class="imgFooter">
            <a href="https://youtube.com" target="_blank"><img src="./css/assets/youtube.png" alt="Youtube Weeklymotion"></a>
            <a href="https://instagram.com" target="_blank"><img src="./css/assets/insta.png" alt="Instagram Weeklymotion"></a>
            <a href="https://facebook.com" target="_blank"><img src="./css/assets/facebook.png" alt="Facebook Weeklymotion"></a>
            <a href="https://twitter.com" target="_blank"><img src="./css/assets/twitter.png" alt="Twitter Weeklymotion"></a>
        </div>
        <div class="txtFooter">
            <p>© 2024 Weeklymotion</p>
        </div>
    </footer>
</body>

</html>
