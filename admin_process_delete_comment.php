<?php
include("./connect_db.php");

// Get required post variables
$articleId = $_POST["articleId"];
$commentId = $_POST["commentId"];


// prepare deletion
$stmt = $db->prepare("delete from comments where commentId = :commentId");

// bind parameter of articleId
$stmt->bindParam(":commentId", $commentId);

// execute the statement
$stmt->execute();

// exit script
include("./admin_manage_posts.php");
exit;   

// close db
include("./close_db.php");
?>