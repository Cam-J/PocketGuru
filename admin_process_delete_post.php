<?php
include("./connect_db.php");

$postId = $_POST['postId'];

// prepare deletion
$stmt = $db->prepare("delete from posts where postId = :postId");
// bind parameter of postId
$stmt->bindParam(":postId", $postId);
// execute the statement
$stmt->execute();
// exit script
header("location: ./admin_manage_posts.php");
// close db
include("./close_db.php");

?>