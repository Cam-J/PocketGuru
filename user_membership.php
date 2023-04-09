<?php
include("./header.php");
include("./connect_db.php");

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
    <p>If you would like to update your membership please select the membership tier you would like, and press the "Order Now" button to confirm your decision</p>
    <div class="container-fluid">
        <form action="./process_update_membership.php" method="POST">
            <fieldset>
                <div class="form-group">
                    <label class="form-control-label" for="membership" style="font-weight: bold;">Current Membership:</label>
                    <input class="form-control" style="width: 300px;" type="text" id="membership" name="membership" value="<?php echo $_SESSION['membership'] ;?>" required>
                </div>
                    <td>
                        <form action="./process_update_membership.php" method="post">
                            <select name="newMembership">
                                <option value="Gold">Gold</option>
                                <option value="Silver">Silver</option>
                                <option value="Bronze">Bronze</option>
                                <option value="Free">Free</option>
                            </select>
                            <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION["userId"] ;?>">                                
                            <input type="submit" value="Update">
                        </form>
                    </td>
                </fieldset>

                <!--form button-->
                <div style="text-align: center;">
                </div>
            </form> <!--form-->
    </div><!--container-->

<?php
include("./footer.php") ;
}
?>
