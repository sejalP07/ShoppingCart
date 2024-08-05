<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


function getProductDetails($id) {

    $products = array(
        1 => array('name' => 'Product 1', 'price' => 20.00, 'image' => 'product.jpg'),
        2 => array('name' => 'Product 2', 'price' => 30.00, 'image' => 'product2.jpg'),
        3 => array('name' => 'Product 3', 'price' => 25.00, 'image' => 'product3.jpg'),
		4 => array('name' => 'Product 4', 'price' => 45.00, 'image' => 'product4.png'),
		5 => array('name' => 'Product 5', 'price' => 15.00, 'image' => 'product5.jpg'),
		6 => array('name' => 'Product 6', 'price' => 25.00, 'image' => 'product6.jpg'),
		7 => array('name' => 'Product 7', 'price' => 10.00, 'image' => 'product7.jpg'),
		8 => array('name' => 'Product 8', 'price' => 35.00, 'image' => 'product8.jpg'),
		9 => array('name' => 'Product 9', 'price' => 17.00, 'image' => 'product9.jpg'),
		10=> array('name' => 'Product 10', 'price' => 25.00, 'image' => 'product10.jpg'),
		11=> array('name' => 'Product 11', 'price' => 12.00, 'image' => 'product11.jpg'),
		12=> array('name' => 'Product 12', 'price' => 22.00, 'image' => 'product12.jpg'),
    );

    return $products[$id];
}

// Add to cart
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $id = intval($_GET['id']);
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
    } else {
        $_SESSION['cart'][$id]++;
    }
    header('Location: cart.php');
    exit();
}

// Remove from cart
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        if ($_SESSION['cart'][$id] > 1) {
            $_SESSION['cart'][$id]--;
        } else {
            unset($_SESSION['cart'][$id]);
        }
    }
    header('Location: cart.php');
    exit();
}

// Function to calculate cart total
function calculateCartTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $product = getProductDetails($id);
        $total += $product['price'] * $quantity;
    }
    return $total;
}
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
        <div class="container">
            <h1>Your Shopping Cart</h1>
            <a href="index.php">Continue Shopping</a>
        </div>
    </header>
    <div class="cart">
        <div class="container">
            <?php if (!empty($_SESSION['cart'])): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $id => $quantity): ?> 
                            <?php $product = getProductDetails($id); ?>
                            <tr>
                                <td class="product">
                                    <img src="images/<?php echo $product['image']; ?>" 
									alt="<?php echo $product['name']; ?>">
                                    <span class="name"><?php echo $product['name']; ?></span>
                                </td>
                                <td class="price">$<?php echo number_format($product['price'], 2); ?></td>
                                <td class="quantity">
                                    <a href="cart.php?action=remove&id=<?php echo $id; ?>" class="remove">-</a>
                                    <span><?php echo $quantity; ?></span>
                                    <a href="cart.php?action=add&id=<?php echo $id; ?>" class="add">+</a>
                                </td>
                                <td class="total">$<?php echo number_format($product['price'] * $quantity, 2); ?></td>
                                <td class="action"><a href="cart.php?action=remove&id=<?php echo $id; ?>">Remove</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="cart-total">
                    <span>Total:</span>
                    <span class="amount">$<?php echo number_format(calculateCartTotal(), 2);
					?></span>
                </div>
                <div class="checkout">
                    <a href="#" class="btn">Proceed to Checkout</a>
                </div>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
