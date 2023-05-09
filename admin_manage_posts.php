<?php
include("./admin_header.php");
include("./connect_db.php");

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

<?php
// Prepare select statement
$stmt = $db->prepare("select * from posts, users
where posts.userId = users.userId
order by created_at DESC");

// Execute the statement
$stmt->execute();

// Loop through the results and display each post
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{

    ?>
    <form action="./admin_post_options.php" method="POST">

    <?php
        echo "<h3 name='postId' >Post ID: " . $row['postId'] . "<br>Membership Level: " . $row['memberView'] . "</h3>";
        echo "<div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;'>";
        echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
        echo "<h4 id='title'><u>" . $row['title'] . "</u><h4>";
        echo "<input type='hidden' type='text' id='title' name='title' disabled>";
        echo "</div>";
        echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
        echo "<p class='text-left' id='content'><textarea id='content' name='content' rows='10' disabled>" . $row['content'] . "</textarea></p>";
        echo "<p class='text-center' id='user.date'>Author: " . $row['username'] .  "</br>" . $row['created_at'] . "</p>";
        echo "</div>";
    ?>

    <!-- 
    Form to display options for each post, the options will be as such
    Update ( will allow admin to update the body of text within the post)
    Delete ( Will delete the post and all comments linked to the postId)
    Comments ( Will allow admin to remove comments )
    -->

        <div style="text-align: left;">
        <input type="hidden" name="postId" id="postId" value="<?php echo $row['postId'];?>">
        <button class="btn-danger" name="update" type="submit">Update Post</button>
        <button class="btn-danger" name="delete" type="submit">Delete Post</button>
        </div>

    </form> <!--form-->
    <?php
    echo "</div>";
}

}
include("./footer.php");
?>