<?php
// Database connection data (use for XAMPP local)
$user = "root" ;
$pass = "" ;
$db = "tltc" ;
$server = "localhost" ;

// This is the connection string
$db = new PDO('mysql:host=localhost;dbname=tltc', $user, $pass);
// Check for any errors
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
