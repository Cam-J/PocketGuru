<?php
include("./connect_db.php");

// Get post variables
$title = $_POST["title"];
$content = $_POST["content"];
$user = $_POST["userId"];

// Insert the new post into the database
$stmt = $db->prepare("insert into articles (articleName, articleData, userId) VALUES (:a, :b, :c)");
// Execute the statement
$stmt->execute(array(
    ":a" => $title,
    ":b" => $content,
    ":c" => $user
));


// Redirect the user back to the main page
header("Location: index.php");
include("./close_db.php");
?>
