<?php
include("./connect_db.php");
// Start session for basket
session_start();

// Check if basket exists, if it doesn't create a basket
if (!isset($_SESSION['basket'])) {
  $_SESSION['basket'] = array();
}

// Get the productId and quantity ordered
$productId = $_POST['productId'];
$quantity = $_POST['quantity'];

if (isset($_SESSION['basket'][$productId])) {
  $_SESSION['basket'][$productId] += $quantity;
} else {
  $_SESSION['basket'][$productId] = $quantity;
}

header("location: ./products.php");
include("./close_db.php");
?>

