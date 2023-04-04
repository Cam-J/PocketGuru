<?php
include("./connect_db.php");

// Get productId from the js request
$product_id = $_POST['product_id'];
// Get the userId from the session
$userId = $_SESSION['userId'];

// Check if the product is already in the basket
$stmt = $db->prepare("select * from basket where productId = :productId");
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();
$basket_item = $stmt->fetch(PDO::FETCH_ASSOC);

if ($basket_item) {
    // Increment the quantity of the existing basket item
    $stmt = $dbh->prepare("update basket set quantity = quantity + 1 where product_id = :product_id");
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();
} else {
    // Add a new basket item
    $stmt = $dbh->prepare("insert into basket (product_id, quantity, usserId) VALUES (:product_id, 1, :userId)");
    $stmt->bindParam(":product_id", $product_id);
    $stmt->bindParam(":userId", $userId)
    $stmt->execute();
}

echo 'Product added to basket.';

include("./close_db.php");
?>