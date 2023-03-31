<?php
include("./header.php");
// check is the user is logged in
if(!isset($_SESSION['username']))
{
    // session is not set, user required to login/register.
    include("./header.php");
    echo "<h5 style='text-align: center;'><br> Hey there, Looks like you are not logged in!</h5><br/>";
    echo "<p style='text-align: center;'> If you wish to view the contents of this page then you may need to login or register.</p>";
	echo "<p style='text-align: center;'> Select the 'Login' option from the side bar menu or click <a href=\"./login.php\">here to login</a>.</p.<br/> ";
	echo "<p style='text-align: center;'> Alternatively if you do not have an account click the 'Register' option from the side bar menu or click <a href=\"./add_customer.php\">here to Register</a>.</p. ";
    include("./footer.php");
}
else
{
    ?>
    <!--form container-->
    <div class="container-fluid">
        <form action="./process_update_user.php" method="POST">
            <fieldset>
                <div class="form-group">
                    <label class="form-control-label" for="userName" style="font-weight: bold;">Username:</label>
                    <input class="form-control" style="width: 300px;" type="text" id="userName" name="userName" value="<?php echo $_SESSION["username"] ;?>" required>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="firstName" style="font-weight: bold;">Forename:</label>
                    <input class="form-control" style="width: 300px;" type="text" id="firstName" name="firstName" value="<?php echo $_SESSION["firstname"] ;?>" required>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="lastname" style="font-weight: bold;">Surname:</label>
                    <input class="form-control" style="width: 300px;" type="text" id="lastname" name="lastname" value="<?php echo $_SESSION["lastname"] ;?>" required>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="address1" style="font-weight: bold;">Address Line 1:</label>
                    <input class="form-control" style="width: 300px;" type="text" id="address1" name="address1" value="<?php echo $_SESSION["address1"] ;?>" required>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="address2" style="font-weight: bold;">Town/City:</label>
                    <input class="form-control" style="width: 300px;" type="text" id="address2" name="address2" value="<?php echo $_SESSION["address2"] ;?>" required>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="postcode" style="font-weight: bold;">Postcode:</label>
                    <input class="form-control" style="width: 300px;" type="text" id="postcode" name="postcode" value="<?php echo $_SESSION["postcode"] ;?>" required>
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="password" style="font-weight: bold;">Password:</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter a password" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="confirm_password" style="font-weight: bold;">Confirm Password:</label>
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
                </div>
                </fieldset>
                    <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION["userId"] ;?>">
                    <!--form button-->
                    <div style="text-align: center;">
                    <button class="btn btn-success" type="submit">Update Personal Details</button>
                </div>
            </form> <!--form-->
    </div><!--container-->

<?php
include("./footer.php") ;
}
?>
