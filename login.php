<?php
include("./header.php");
?>
<html>
    <!-- user login form -->
<form method="post" action="./process_login.php">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>
  <br>
  <label for="confirm_password">Confirm Password:</label>
  <input type="password" id="confirm_password" name="confirm_password" required>
  <br>
  <input type="submit" value="Login">
</form>


<?php
include("./footer.php");
?>