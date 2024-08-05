<?php

$conn = new mysqli('localhost', 'root', '', 'ecommerce_cart');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Our Products</h1>
    </header>
    <div class="products">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="product">
                <img src="images/<?php echo $row['image']; ?>" alt="
				<?php echo $row['name']; ?>">
                <h2><?php echo $row['name']; ?></h2>
                <p>$<?php echo $row['price']; ?></p>
                <a href="cart.php?action=add&id=<?php echo $row['id']; ?>">Add to Cart</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>

