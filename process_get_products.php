<?php
include("./connect_db.php");

// Display products for order.
// Prepare a query to select all information from the products table
$products = $db->query("select * from product");
// Fetch all the products from the query and display them in an array
// Display the products on the storefront page for each product row
if ($products->rowCount() > 0) 
{
  while($row = $products->fetch(PDO::FETCH_ASSOC)) 
  {
    echo "<div class='col-md-4'>";
    echo "<div class='product'>";
    echo "<h3>" . $row["productName"] . "</h3>";
    echo "<img src='" . $row["productImage"] . "' style='width: 400px; height: 400px'>";
    echo "<p>" . $row["productDesc"] . "</p>";
    echo "<span>" . $row["productPrice"] . "</span>";
    echo "</div>";
    if (isset($_SESSION['username']))
    {
        echo "<form action='add_to_basket.php' method='post'>";
        echo "<input id='quantity' name='quantity' value= >";
        echo "<input type='hidden' name='productId' value=" . $row["productId"] . ">";
        echo "<button type='submit'>Add to Basket</button>";
        echo "</form>";
    }
    echo "</div>";
  }
}

include("./close_db.php");
?>
