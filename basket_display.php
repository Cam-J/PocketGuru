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
  <!-- Table to display the basket contents -->
  <thead>
    <tr>
      <th>Name</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <!-- for each item in the array, display its contents for table header -->
    <?php 
    foreach($basket_items as $item): // https://www.w3schools.com/php/php_looping_foreach.asp --> 
    ?>
      <tr>
        <td><?= $item['name'] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><?= $price = "£" . number_format($item['price'], 2); ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2">Total price:</td>
      <td><?= $total_price = "£" . number_format($total_price, 2); ?></td>
    </tr>
  </tfoot>
</table>
<a href="./checkout.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Order Now</a>
<button class="remove-order list-group-item list-group-item-action bg-light" type='submit'>Delete Basket</button>
<!-- if user wants to delete their basket -->
<!-- javascript to handle -->
<script>
  // Find the button
  const removeOrderButton = document.querySelector('.remove-order');
  // When button is pressed do ->
  removeOrderButton.addEventListener('click', function() {
    // relocate to remove_basket.php and unset the basket
    window.location.href = 'remove_basket.php';
    alert('Basket has been removed');
  });
</script>



<?php

include("./close_db.php");
?>

