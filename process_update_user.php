<?php
include("./connect_db.php");

//Assign the transferred POST variables
$userName = $_REQUEST["userName"];
$firstname = $_REQUEST["firstName"];
$lastname = $_REQUEST["lastname"];
$address1 = $_REQUEST["address1"];
$address2 = $_REQUEST["address2"];
$postcode = $_REQUEST["postcode"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$confirm_password = $_REQUEST["confirm_password"];
$userId = $_REQUEST["userId"];

//Create encrypt password

//NOTE we do not need to encrypt for match
$crypted_pass = sha1($password) ;

// Check if passwords match if they dont move to 'else'
if ($password == $confirm_password)
{
    //passwords match prepare statement
    $stmt = $db->prepare("update users set 
    username = :a,
    password = :b,
    firstName = :c,
    lastName = :d,
    address1 = :e,
    address2 = :f,
    postCode = :g,
    email = :h
    where userId = :j");

    //Execute the statement
    $stmt->execute(array(
        ":a" => $userName,
        ":b" => $crypted_pass,
        ":c" => $firstname,
        ":d" => $lastname,
        ":e" => $address1,
        ":f" => $address2,
        ":g" => $postcode,
        ":h" => $email,
        ":j" => $userId
    )) ;
    include("./index.php");
}
else 
{
    //Output message to show the entered data does not match
    include("./header.php") ;
    ?>
    <!--page content-->
    <div class="cotainer-fluid">
        <h6 style="text-align: left; color: blue; font-style: italic;">User Update Failure</h6>
        <p style="text-align: left; color: black;">The password you have entered does match, please try again.</p>
    </div>  
    <?php
    include("./footer.php") ;
}

include("./close_db.php") ;

?>