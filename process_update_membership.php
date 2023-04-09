<?php
include("./connect_db.php");
session_start();

// Get post variable
$newMembership = $_POST['newMembership'];
$userId = $_POST['userId'];

// prep sql
$stmt = $db->prepare("update users set membership = :membership where users.userId = :userId");
// bind parameters
$stmt->bindParam(":membership", $newMembership);
$stmt->bindParam(":userId", $userId);
// execute statement
$stmt->execute();

// update session variable
$_SESSION['membership'] = $newMembership;

header("location: ./user_membership.php");
include("./close_db.php");
?>