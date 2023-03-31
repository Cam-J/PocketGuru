<?php
include("./connect_db.php") ;

// Get form data and insert into users table
$username = $_POST['username'];
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$postcode = $_POST['postCode'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password == $confirm_password)
{
    // Encrypt user password
    $password = sha1($password);

    // Before inserting in to the database, we need to check that the input details don't already exists within the database to avoid duplicate data
    // Prepare select statement
    $does_user_exist = $db->prepare("select username, encrypted_pass from users where 
    username = :a
    or
    encrypted_pass = :b");

    // Execute array of data
    $does_user_exist->execute(array(
        ":a" => $username,
        ":b" => $password
    ));

    // If the query returns a row that matches out put to user that this username is taken otherwise insert data to database.
    if ($does_user_exist->rowCount() == 1)
    {

        //Output message to show the entered data does not match
        include("./header.php") ;
        ?>

        <!--page content-->
        <div class="cotainer-fluid">
            <h6 style="text-align: center; color: blue; font-style: italic;"></br>Login</h6>
            <p style="text-align: center; color: black'">This username already exists, please choose a different username.</p>
        </div>

        <?php
        include("./footer.php") ;
    }
    else
    {

        // Prepare insert statement
        $stmt = $db->prepare("insert into users (username, firstName, lastName, address1, address2, postCode, encrypted_pass) VALUES (:a, :b, :c, :d, :e, :f, :g) ");

        // Execute the statement
        $stmt->execute(array(
            ":a" => $username,
            ":b" => $firstname,
            ":c" => $lastname,
            ":d" => $address1,
            ":e" => $address2,
            ":f" => $postcode,
            ":g" => $password
        ));

        include("./close_db.php");

        // User registered successfuly they may now log in.
        include("./login.php");
    }
}
else
{
    echo "Passwords do not match please try again";
    include("./login.php");
}
?>