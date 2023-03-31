<?php
include("./connect_db.php");

// Get the data from the form
$articleId = $_POST['articleId'];
$newTitle = $_POST['title'];
$newContent = $_POST['content'];

// Update the post in the database
$stmt = $db->prepare('UPDATE articles SET articleName = ?, articleData = ? WHERE articleId = ?');
$stmt->execute([$newTitle, $newContent, $articleId]);

// Redirect the user back to the post
include("./admin_manage_posts.php");
exit;
?>
