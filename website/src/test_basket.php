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
    <link rel="stylesheet" href="../css/basket.css">
    <title>Document</title>
</head>
<body>
    <h1>Your basket</h1>
    <div class="boxElement">
    <?php 
    if ($film) {echo "<img src='" . $film['image_link'] . "' alt='Image du film' style='max-width: autopx; max-height: 200px;'>";}
    ?>
        <div class="paddingSpace">
        <h2><?php if($film){echo $film['title'];}?></h2>
        <h3>Director : <?php if($film){echo $film['director'];}?></h3>
        <h3>Genre : <?php if($film){echo $film['genre'];}?></h3>
        <h3>Price : <?php if($film){echo $film['price'];}?></h3>
        </div>
    </div>
    <div class="buttonPosition">
        <button>
            <span class="transition"></span>
            <span class="gradient"></span>
            <span class="label">Buy</span>
        </button>
        <button>
            <span class="transition2"></span>
            <span class="gradient"></span>
            <span class="label">Delete All</span>
        </button>
    </div>
</body>
</html>