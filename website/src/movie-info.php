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
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                try {
                    $stmt = $pdo->prepare("UPDATE film SET in_cart = 1 WHERE id = :id");
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();

                    $message = "Film ajouté au panier avec succès !";
                } catch (PDOException $e) {
                    $message = "Erreur : Le film n'a pas été ajouté au panier : " . $e->getMessage();
                }
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
    <main>
        <div class="infoSide">
            <h1><?php echo $film['title']; ?></h1>
            <h2>Actors :</h2>
            <h3><?php echo $film['actors']; ?></h3>
            <h2>Price : <?php echo $film['price']; ?> $</h2>
            <div class="divcenter">
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $film['id']; ?>">
                    <button type="submit">
                        <span class="transition"></span>
                        <span class="gradient"></span>
                        <span class="label">Add to cart</span>
                    </button>
                </form>
                <?php if (!empty($message)) : ?>
                    <div class="message"><?php echo $message; ?></div>
                <?php endif; ?>
            </div>
            <div>
                <h2>Director's other films :</h2>
                <div class="filmBox">
                    <img class="filmBoxImg" src="<?php echo $film['image_link']; ?>" alt="Film mis en avant" draggable="False">
                    <p class="filmBoxText"><?php echo $film['title']; ?></p>
                </div>
            </div>
        </div>
        <img class="poster" src="<?php echo $film['image_link']; ?>" alt="Film poster" draggable="False">
    </main>
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
