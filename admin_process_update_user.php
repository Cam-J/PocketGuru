<?php
include("./connect_db.php");

// Get post data from form
$userId = $_POST["userId"];
$userRole = $_POST["userRole"];

// Prepare the sql statement
$stmt = $db->prepare("update users set 
userRole = :a 
where userId = :b");

// Execute statement 
$stmt->execute(array(
    ":a" => $userRole,
    ":b" => $userId
));

// Display if the roles were updated successfully or not
if ($stmt) 
{
    include("./admin_userControl.php");
} 
else 
{
    echo "Error updating user role";
}
include("./close_db.php");
?>