<?php
include("./connect_db.php");
session_start();

// Retrieve the product ID from the POST data
$productId = $_POST['productId'];
$quantity = $_POST['quantity'];

// Add the product ID to the basket session variable
$_SESSION['basket'][$productId] = $quantity;


// Redirect back to the products page
header('Location: products.php');
exit();

include("./close_db.php");
?>

