<?php
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO orders (name, product, quantity)
            VALUES ('$name', '$product', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        $message = "✅ Order placed successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="products.php">Products</a>
</div>

<h2>🧾 Place Your Order</h2>

<!-- Success Message -->
<?php
if ($message != "") {
    echo "<p class='success'>$message</p>";
}
?>

<!-- Form -->
<form method="POST">

    <input type="text" name="name" placeholder="Enter your name" required>

    <select name="product">
    <option>Chocolate Cake</option>
    <option>Vanilla Cake</option>
    <option>Strawberry Cake</option>
    <option>Birthday Cake</option>
    <option>Wedding Cake</option>
    <option>Custom Cake</option>
    <option>Chocolate Cupcake</option>
    <option>Vanilla Cupcake</option>
    <option>Red Velvet Cupcake</option>
    <option>Croissant</option>
    <option>Donut</option>
    <option>Brownie</option>
</select>

    <input type="number" name="quantity" placeholder="Quantity" required>

    <button type="submit">Place Order</button>

</form>

<!-- Footer -->
<div class="footer">
    © 2026 The Happy Batter | Made by You 💖
</div>

</body>
</html>