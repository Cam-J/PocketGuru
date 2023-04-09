<?php
include("./connect_db.php");

// Get post data from form
$userId = $_POST["userId"];
$membership = $_POST["membership"];

// Prepare the sql statement
$stmt = $db->prepare("update users set 
membership = :a 
where userId = :b");

// Execute statement 
$stmt->execute(array(
    ":a" => $membership,
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