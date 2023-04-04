<?php
include("./connect_db.php");
// Get user details from login.php
$username = $_POST["username"];
$password = $_POST["password"];
$confirm_pass = $_POST["confirm_password"];

// Encrypt password
$password = sha1($password);

// Create sql statement to query database for users
// Prepare the sql statement
$stmt = $db->prepare("select * from users where username = :a and password = :b ");

// Execute sql statement
$stmt->execute(array(
    ":a" => $username,
    ":b" => $password
)) ;

// If the stmt returns a row that matches the input information then
if ($stmt->rowCount() == 1)
{
    // All details of the returned users information is returned
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // The password is then checked that the input password is indeed correct after encryption
    if ($password = $user["password"])
    {
        // Login is succesful
        // Create session data of the users name and their role
        session_set_cookie_params(0);
        session_start();
        $_SESSION["userId"] = $user["userId"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["userRole"] = $user["userRole"];
        $_SESSION["firstname"] = $user["firstName"];
        $_SESSION["lastname"] = $user["lastName"];
        $_SESSION["address1"] = $user["address1"];
        $_SESSION["address2"] = $user["address2"];
        $_SESSION["postcode"] = $user["postCode"];
        include("./login_header.php");
        ?>
        <!--page content-->
        <div class="cotainer-fluid">
            <h6 style="text-align: center; color: blue; font-style: italic;"></br>Welcome!</h6>
            <p style="text-align: center; color: black'">You have successfully logged in, feel free to browse the website at your leisure.</p>
        </div>
        <?php
        include("./footer.php");
    }
}
else
{
    // If password does not match or user does not have an account display the following.
    include("./header.php");
    ?>
    <!--page content-->
    <div class="cotainer-fluid">
        <h6 style="text-align: center; color: blue; font-style: italic;"></br>Login</h6>
        <p style="text-align: center; color: black;">This password is either incorrect or you do not have an account.</p>
    </div>
    <?php
    include("./footer.php");
}
?>