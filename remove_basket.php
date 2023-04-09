<?php
session_start();
unset($_SESSION['basket']);
header('Location: products.php'); // Redirect the user to another page
?>


