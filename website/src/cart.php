<?php
require_once 'db_connect.php';

$cartTitle = "Cart";
if (isset($_SESSION['username'])) {
    $cartTitle = "Cart of " . $_SESSION['username'];
}

if (isset($_POST['clear_cart'])) {
    try {
        $stmt = $pdo->prepare("UPDATE film SET in_cart = 0 WHERE in_cart = 1");
        $stmt->execute();
        header("Location: cart.php"); 
    } catch (PDOException $e) {
        echo "Error clearing cart: " . $e->getMessage();
        exit;
    }
}

if (isset($_POST['remove_from_cart'])) {
    $id = $_POST['film_id'] ?? null;
    
    if (!$id) {
        echo "Film ID not provided.";
        exit;
    }
    
    try {
        $stmt = $pdo->prepare("UPDATE film SET in_cart = 0 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: cart.php"); 
    } catch (PDOException $e) {
        echo "Error removing item from cart: " . $e->getMessage();
        exit;
    }
}

try {
    $stmt = $pdo->prepare("SELECT * FROM film WHERE in_cart = 1");
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total = 0;
    foreach ($films as $film) {
        $total += $film['price'];
    }
} catch (PDOException $e) {
    echo "Error fetching films from cart: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>
    <h1><?php echo $cartTitle; ?></h1>

    <?php if (!isset($_SESSION['username'])) : ?>
        <p>You must be logged in to access your cart.</p>
    <?php elseif (empty($films)) : ?>
        <p>Your cart is empty.</p>
    <?php else : ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="cart">
                <?php foreach ($films as $film) : ?>
                    <div class="film">
                        <img src="<?php echo $film['image_link']; ?>" alt="<?php echo $film['title']; ?>">
                        <span><?php echo $film['title']; ?></span>
                        <span><?php echo $film['actors']; ?></span>
                        <span><?php echo $film['price']; ?> $</span>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="film_id" value="<?php echo $film['id']; ?>">
                            <button type="submit" name="remove_from_cart">Remove</button>
                        </form>
                    </div>
                <?php endforeach; ?>
                <div class="total">
                    Total: <?php echo $total !== 0 ? $total . "€" : 'NULL'; ?>
                </div>
                <button type="submit" name="clear_cart">Clear Cart</button>
            </div>
        </form>
    <?php endif; ?>
</body>

</html>
