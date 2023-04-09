<?php
include("./connect_db.php");

$postId = $_POST['postId'];

// prepare deletion
$stmt = $db->prepare("delete from POSTS where postId = :postId");
// bind parameter of postId
$stmt->bindParam(":postId", $postId);
// execute the statement
$stmt->execute();
// exit script
exit;   

// close db
include("./close_db.php");
include("./admin_manage_posts.php");
?>