<?php
include("./header.php");
include("./connect_db.php");

// PAGE PRODUCT LIMIT CONTROL
// Count the total number of products
$check_products = $db->query("select count(*) as total from product");
$count_products = $check_products->fetch(PDO::FETCH_ASSOC);
$total_products = $count_products['total'];

// products displayed on each page 
$products_per_page = 10;
// ceil function to round up to the neearest whole int, so I don't display random numbers of products per page.
$total_pages = ceil($total_products / $products_per_page);

// Get the current page number from the query string, defaults as page 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the limit and offset for the query
$limit = $products_per_page;
$offset = ($current_page - 1) * $products_per_page;

// Retrieve the products for the current page : https://www.sqltutorial.org/sql-limit/
$product_query = $db->prepare("select * from product LIMIT :limit OFFSET :offset");
$product_query->bindParam(':limit', $limit, PDO::PARAM_INT);
$product_query->bindParam(':offset', $offset, PDO::PARAM_INT);
$product_query->execute();
// !!!!!!!!!!!!!!!!!!



// Display products for order.
// Prepare a query to select all information from the products table
$get_products = $db->query("select * from product");

// Fetch all the products from the query and display them in an array
$products = $get_products->fetchAll(PDO::FETCH_ASSOC);

// Display the products on the storefront page for each product row
foreach ($products as $product) {
    ?>
    <div class="products">
    <?php
    echo "<div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;  '>";
    echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
    echo "<h2>" . $product['productName'] . "</h2>";
    echo "<p>" . $product['productDesc'] . "</p>";
    echo "<p>Price: $" . $product['productPrice'] . "</p>";
    echo "<img style='width: 50%' src=" . $product['productImage'] . " class='rounded' />";
    // form for adding product to basket
    echo "</div>";
    echo '<form action="add_basket.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . $product['productId'] . '">';
    echo '<button type="submit">Add to Basket</button>';
    echo '</form>';
    echo "</div>";
}

// links to allow the user to navigate the pages:  https://codeshack.io/how-to-create-pagination-php-mysql/
echo '<div>';
if ($current_page > 1) {
  echo '<a href="products.php?page=' . ($current_page - 1) . '">Previous</a> ';
}
if ($product_query->rowCount() == $products_per_page) {
  echo '<a href="products.php?page=' . ($current_page + 1) . '">Next</a>';
}
echo '</div>';

include("./footer.php");
include("./close_db.php");
?>