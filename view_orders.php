<?php
include 'db.php';

$result = $conn->query("SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Orders</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="products.php">Products</a>
    <a href="order.php">Order</a>
    <a href="view_orders.php">Orders</a>
</div>

<h2>All Orders 📋</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Action</th>
</tr>

<?php
$count = 1;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$count++."</td>
            <td>".$row['name']."</td>
            <td>".$row['product']."</td>
            <td>".$row['quantity']."</td>
            <td>
                <a href='delete.php?id=".$row['id']."' 
                onclick=\"return confirm('Are you sure you want to delete this order?')\">
                Delete
                </a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No orders yet 😢</td></tr>";
}
?>

</table>

<!-- Footer -->
<div class="footer">
    © 2026 The Happy Batter | Made for You 💖
</div>

</body>
</html>