<?php
include("./connect_db.php");

// Get post variables from table
$productId = $_POST[$productId];
$productname = $_POST[$item['name']];
$quantity = $_POST[$item['quantity']];
$userId = $_POST[$_SESSION['userId']];

echo $productId . $productname . $quantity . $userId;

?>