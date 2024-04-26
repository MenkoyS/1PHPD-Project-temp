<?php
$host = 'db'; 
$dbname = 'my_db';
$username = 'my_user'; 
$password = 'my_password';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $filmId = 1;

    $stmt = $pdo->prepare("SELECT * FROM film WHERE id = :filmId");
    $stmt->bindParam(':filmId', $filmId);
    $stmt->execute();
    $film = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur lors de la récupération du film : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/movie-info.css">
    <title>Weeklymotion - Movie Information</title>
</head>

<body>
    <main>
        <div class="infoSide">
            <h1><?php
                if($film){echo $film['title'];}
                else{echo "Film non trouvé.";}
            ?></h1>
            <h2>Genre : <?php
                if($film){echo $film['genre'];}
                else{echo "Film non trouvé.";}
            ?></h2>
            <h2>Director : <?php
                if($film){echo $film['director'];}
                else{echo "Film non trouvé.";}
            ?></h2>
            <h2>Director link : <?php
                if($film){echo $film['director_link'];}
                else{echo "Film non trouvé.";}
            ?></h2>
            <h2>Actors : </h2>
            <h3><?php
                if($film){echo $film['actors'];}
                else{echo "Film non trouvé.";}
            ?></h3>
            <h2>Price : 
            <?php
            if($film){echo $film['price'];}
                else{echo "Film non trouvé.";}
            ?></h2>
            <div class="divcenter">
                <button>
                    <span class="transition"></span>
                    <span class="gradient"></span>
                    <span class="label">Add to cart</span>
                </button>
            </div>
            <div>
                <h2>Director's others films :</h2>
                <div class="filmBox">
                    <img class="filmBoxImg" src="../../assets/oppenheimer.jpg" alt="Film mit en avant" draggable="False">
                    <p class="filmBoxText">Movie title</p>
                </div>
            </div>
        </div>
        <?php
        if ($film) {
            echo "<img src='" . $film['image_link'] . "' alt='Image du film' style='max-width: autopx; max-height: 300px; padding:7%;'>";
        }
        ?>
    </main>
    <footer>
        <div class="imgFooter">
            <a href="https://youtube.com" target="_blank"><img src="../../assets/youtube.png"
                    alt="Youtube Weeklymotion"></a>
            <a href="https://instagram.com" target="_blank"><img src="../../assets/insta.png"
                    alt="Instagram Weeklymotion"></a>
            <a href="https://facebook.com" target="_blank"><img src="../../assets/facebook.png"
                    alt="Facebook Weeklymotion"></a>
            <a href="https://twitter.com" target="_blank"><img src="../../assets/twitter.png"
                    alt="Twitter Weeklymotion"></a>
        </div>
        <div class="txtFooter">
            <p>© 2024 Weeklymotion</p>
        </div>
    </footer>
</body>

</html>