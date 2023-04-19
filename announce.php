<?php
include("./header.php");
include("./connect_db.php");
include("./functions.php");
?>
<h1 style="text-align: center;"> Announcements </h1>

<!-- select all articles created and display them for viewing -->
<?php
if ($_SESSION['userRole'] == 'admin')
{
    display_gold();
}
if ($_SESSION['membership'] == 'gold')
{
    display_gold();
}
if ($_SESSION['membership'] == 'silver')
{
    display_silver();
}
if ($_SESSION['membership'] == 'bronze')
{
    display_bronze();
}

if (!$_SESSION['membership'] == 'free')
{
    display_free();
}

include("./footer.php");
?>