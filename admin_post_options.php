<?php
include("./connect_db.php");
include("./header.php");

$postId = $_POST['postId'];

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
include("./footer.php");
header("location: ./admin_manage_posts.php");
?>

<div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;'>