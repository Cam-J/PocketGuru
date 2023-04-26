<?php
include("./header.php");
include("./connect_db.php");

$userId = $_SESSION["userId"];
$email = $_SESSION["email"];

// Use the data from our basket-display.php to create the order insert statement.
$order = $db->prepare("insert into orders (userId, email) VALUES (:a, :b)");
$order->execute(array(
    ":a" => $userId,
    ":b" => $email
));
// The Insert statement creates an order, that holds the ID and user details related as well as the time and date the order was placed

// This insert statement will go in to the orderdetails table, this wil hold all product information within the order such as the orderId, product details(ID,name,quantity,price)
// lastinsertId() gives the most recent inserted row
$orderId = $db->lastInsertId();

// Insert in to orderdetails using the lastInsertId() to allow two tables to hold information relevant to orders
$orderDetails = $db->prepare("insert into orderdetails (orderId, productId, productName, quantity, price) values (:orderId, :productId, :productname, :quantity, :price)");
foreach ($basket_items as $item) {
    $orderDetails->bindParam(":orderId", $orderId);
    $orderDetails->bindParam(":productId", $item["productId"]);
    $orderDetails->bindParam(":productname", $item["name"]);
    $orderDetails->bindParam(":quantity", $item["quantity"]);
    $orderDetails->bindParam(":price", $item["price"]);
    $orderDetails->execute();
}
if ($orderDetails->execute())
{
    // sql executed successfully, so delete the basket
    unset($_SESSION['basket']);
    ?>
    <!-- display thank you message to user for their order -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Thank You for Your Order!</title>
    </head>
    <body>
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been successfully placed. Here are the details:</p>
        <ul>
        <li>Order Number: <?php echo $orderId ?></li>
        <li>Order Total: <?php echo $total_price ?></li>
        </ul>
        <p>A confirmation email has been sent to your email address.</p>
    </body>
    </html>
    <?php
} 
else 
{
    // sql did not execute properly
    echo "There appears to be an issue, minions are handling this as we speak.";
}
include("./close_db.php");
include("./footer.php");
?>