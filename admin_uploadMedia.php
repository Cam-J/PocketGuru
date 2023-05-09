<?php
include("./admin_header.php");

if($_SESSION['userRole'] != 'admin')
{
	?>
	<?php
	include ("./header.php");
    // Session is not set, user required to login/register.
    echo "<h5 style='text-align: center;'><br> Hey there, it looks like you are trying to access something you shouldn't!</h5><br/>";
    echo "<p style='text-align: center;'> If you wish to view the contents of this page then you must be an admin.</p>";
	echo "<p style='text-align: center;'> Admins: Select the 'Login' option from the side bar menu or click <a href=\"./login.php\">here to login</a>.</p.<br/> ";
	echo "<p style='text-align: center;'> Mysterious user who wandered in to this location: <a href=\"./index.php\">click here!</a>.</p> ";
	?>
<?php
}
else
{

?>	
<!-- form to allow admin users to upload images and videos to the website for use through out the site -->
<!-- enctype multipart/form-data is the encode type used when handline "file" data -->
<form action="./admin_process_uploadMedia.php" method="POST" enctype="multipart/form-data">
    <label for="file">Choose file:</label>
    <input type="file" name="file" id="file"><br><br>
    <label for="title">Title:</label>
    <input type="text" name="title" id="title"><br><br>
    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea><br><br>
    <button type="submit" name="submit">Submit</button>
    <input type="hidden" name="userId" id="userId" value=<?php echo $_SESSION["userId"]; ?>>
</form>

<?php
}
include("./footer.php");
?>

