<?php
    // start session
    session_start();

    // Unset the session variables by creating an array with no data
    $_SESSION = array();

    // end the session with the following function
    session_destroy();

    // User can now close the website but shall be redirected to the index page.
    include("./index.php");
    // exit is used to stop any code getting executed after destroying the session
    exit();
?>