<?php
include("./connect_db.php");

// Get form data and insert into comments table
$userId = $_POST["userId"];
$comment_content = $_POST["content"];
$articleId = $_POST["articleId"];

// Prepare sql statement
$stmt = $db->prepare("insert into comments (commentData, userId, articleId) values
(:a,:b, :c)");

$stmt->execute(array(
    ":a" => $comment_content,
    ":b" => $userId,
    ":c" => $articleId
));

include("./theScene.php");

include("./close_db.php");
?>
