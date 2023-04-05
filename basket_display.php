<?php
include("./connect_db.php");

// Basket for  display

// Check if exists
if (!isset($_SESSION['basket'])) {
  $_SESSION['basket'] = array();
}

// Empty array for the basket
$basket_items = array();
// Total price variable set at 0
$total_price = 0;

// For each item in the basket as productId and it's relevant quantity select all from database and display as matches
foreach ($_SESSION['basket'] as $productId => $quantity)
{
  $stmt = $db->prepare("select * from product where productId = :productId");
  // Bind parameter to $productId variable
  $stmt->bindParam(':productId', $productId);
  $stmt->execute();
  // Gather all rows in an array
  $product = $stmt->fetch(PDO::FETCH_ASSOC);

  // Get price of items times the chosen quantity
  $price = $product['productPrice'] * $quantity;


  $basket_items[] = array('productId' => $productId, 'name' => $product['productName'], 'quantity' => $quantity, 'price' => $price);

  $total_price += $price;
}
?>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($basket_items as $item): ?>
      <tr>
        <td><?= $item['name'] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><?= $item['price'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2">Total price:</td>
      <td><?= $total_price ?></td>
    </tr>
  </tfoot>
</table>
<a href="./checkout.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Order Now</a>

<?php

include("./close_db.php");
?>

