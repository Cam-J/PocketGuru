<?php
include("./header.php");
?>
<script>
    function validateName()
    {
        let name = document.forms["regsitration"]["userName"].value;
            if (name == "")
            {
                alert("Name must be filled out");
                return false;
            }
    }
</script>

<!--form container-->
<div class="container-fluid">
    <form name="registration" action="./process_register.php" onsubmit="return validateName()" method="POST">
        <fieldset class="form-group">
            <div class="form-group">
                <label class="form-control-label" for="username" style="font-weight: bold;">Username:</label>
                <input class="form-control" style="width: 300px;" type="text" id="username" name="username" placeholder="Enter username" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="firstName" style="font-weight: bold;">forename:</label>
                <input class="form-control" style="width: 300px;" type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="lastName" style="font-weight: bold;">Surename:</label>
                <input class="form-control" style="width: 300px;" type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="address1" style="font-weight: bold;">Address Line 1:</label>
                <input class="form-control" style="width: 300px;" type="text" id="address1" name="address1" placeholder="Address Line 1" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="address2" style="font-weight: bold;">Town/City:</label>
                <input class="form-control" style="width: 300px;" type="text" id="address2" name="address2" placeholder="Town/City" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="postCode" style="font-weight: bold;">Postcode:</label>
                <input class="form-control" style="width: 300px;" type="text" id="postCode" name="postCode" placeholder="Enter your postcode" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="email" style="font-weight: bold;">Email:</label>
                <input class="form-control" style="width: 300px;" type="text" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="password" style="font-weight: bold;">Password:</label>
                <input class="form-control" type="password" style="width: 300px;" name="password" id="password" placeholder=""
                required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="confirm_password" style="font-weight: bold;">Confirm Password:</label>
                <input class="form-control" type="password" style="width: 300px;" name="confirm_password" id="confirm_password" placeholder="Confirm password"
                required>
            </div>

            </fieldset><!-- fieldset -->
            <!--form button-->
            <div style="text-align: center;">
            <button class="btn btn-success" type="submit">Register</button>
        </div>
    </form> <!--form-->
</div><!--container-->

<?php
include("./footer.php");
?>

