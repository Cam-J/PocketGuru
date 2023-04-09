<?php
include("./connect_db.php");

// Get post variables
$title = $_POST["title"];
$content = $_POST["content"];
$user = $_POST["userId"];
$fileId = $_POST["file_select"];
$membership = $_POST["membership"];

// Insert the new post into the database
$stmt = $db->prepare("insert into posts (title, content, fileId, userId, memberView) VALUES (:a, :b, :c, :d, :e)");
// Execute the statement
$stmt->execute(array(
    ":a" => $title,
    ":b" => $content,
    ":c" => $fileId,
    ":d" => $user,
    ":e" => $membership
));


// Redirect the user back to the main page
header("Location: index.php");
include("./close_db.php");
?>
