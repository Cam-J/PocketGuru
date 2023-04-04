<?php
include("./header.php");
include("./connect_db.php");


if (!empty($productIds)) {
    $stmt = $db->query("select * from product where productId IN (" . implode(",", $productIds) . ")");
    $totalPrice = 0;
  
    echo "<table>";
    echo "<tr><th>Name</th><th>Price</th></tr>";
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $productId = $row['productId'];
      $product_name = $row['productName'];
      $product_price = $row['productPrice'];
      $totalPrice += $product_price;
  
      echo "<tr>";
      echo "<td>" . $product_name . "</td>";
      echo "<td>" . $product_price . "</td>";
      echo "</tr>";
    }
  
    echo "<tr><td>Total</td><td>" . $totalPrice . "</td></tr>";
    echo "</table>";
    echo "<a href='./checkout.php' class='list-group-item list-group-item-action bg-light' style='color: black;'>Order Now</a>";
  }

include("./close_db.php");
include("./footer.php");
?>
