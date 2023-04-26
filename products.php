<?php
include("./header.php");
include("./connect_db.php");
?>

<h2 style="text-align: center;">Products</h2>

<?php

$get_products = $db->query("select * from product");

// Fetch all the products from the query and display them in an array
$products = $get_products->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container" id="product-container">
    <div class="row">
    <?php
    include("./process_get_products.php");
    ?>
    </div>  
</div>

<?php
// links to allow the user to navigate the pages:  https://codeshack.io/how-to-create-pagination-php-mysql/


include("./footer.php");
include("./close_db.php");
?>