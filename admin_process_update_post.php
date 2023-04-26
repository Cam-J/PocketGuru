<?php
include("./connect_db.php");

// Get the data from the form
$postId = $_POST['postId'];
$newTitle = $_POST['title'];
$newContent = $_POST['content'];

// Update the post in the database
$stmt = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE postId = ?');
$stmt->execute([$newTitle, $newContent, $postId]);

// Redirect the user back to the post
include("./admin_manage_posts.php");
exit;
?>
