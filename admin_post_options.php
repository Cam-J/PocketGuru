<?php
include("./connect_db.php");
include("./admin_header.php");	

$postId = $_POST['postId'];
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
// EDIT POSTS OPTION
if(isset($_POST['update']) == TRUE)
{
    $postId = $_POST['postId'];

    // Prepare select statement
    $stmt = $db->prepare("select * from posts, users where posts.postId = :postId");
    // Bind postId to passed $postId variable                    
    $stmt->bindParam(":postId", $postId);
    // Execute the statement
    $stmt->execute();

    // get the row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $title = $row['title'];
    $content = $row['content'];

    ?>
    
    <!-- Form to display the content of a post and allow it to be eddited upon clicking update process is passed to the server side script -->
    <form action="./admin_process_update_post.php" method="POST">
        <input type="hidden" name="postId" value="<?php echo $postId; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $title; ?>">
        <br>
        <label for="content">Content:</label>
        <textarea name="content"><?php echo $content; ?></textarea>
        <br>
        <input type="submit" value="Update">
    </form>
    
    <?php
}
// DELETE POST OPTION 
if(isset($_POST['delete']) == TRUE)
{
    echo "POST ID: " . $postId;
    echo "<br>Are you sure you want to delete this post?";
    echo "<br>If you wish to continue select 'delete', if you wish to return to the previous page click <a href:./admin_manage_posts.php>here<a/><br>";
    ?>

    <form action="./admin_process_delete_post.php" method="POST">
        <input type="hidden" name="postId" value="<?php echo $postId; ?>">
        <br>
        <input type="submit" value="delete">
    </form>
    
    <?php
}
include("./footer.php");
header("location: ./admin_manage_posts.php");
}
?>


<div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;'>