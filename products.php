<?php
include("./header.php");
include("./connect_db.php");
?>

<script>
// Add event listener to "add to basket" buttons
document.querySelectorAll('.add_to_basket').forEach(button => {
    button.addEventListener('click', () => {
        // 
        const productId = button.dataset.productId;
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'add-to-basket.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = () => {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error(xhr.statusText);
            }
        };
        xhr.onerror = () => {
            console.error(xhr.statusText);
        };
        xhr.send(`product_id=${productId}`);
    });
});
</script>

<?php
// Display products for order.
// Prepare a query to select all information from the products table
$get_products = $db->query("select * from product");

// Fetch all the products from the query and display them in an array
$products = $get_products->fetchAll(PDO::FETCH_ASSOC);

// Display the products on the storefront page for each product row
foreach ($products as $product)
{
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
    echo '<button class="add_to_basket" type="submit">Add to Basket</button>';
    echo '</form>';
    echo "</div>";
}

// links to allow the user to navigate the pages:  https://codeshack.io/how-to-create-pagination-php-mysql/


include("./footer.php");
include("./close_db.php");
?>