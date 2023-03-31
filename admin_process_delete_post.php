<?php
include("./connect_db.php");

$articleId = $_POST['articleId'];

// prepare deletion
$stmt = $db->prepare("delete from articles where articleId = :articleId");
// bind parameter of articleId
$stmt->bindParam(":articleId", $articleId);
// execute the statement
$stmt->execute();
// exit script
exit;   

// close db
include("./close_db.php");
include("./admin_manage_posts.php");
?>