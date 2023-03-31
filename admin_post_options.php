<?php
include("./connect_db.php");
include("./header.php");

$articleId = $_POST['articleId'];

// EDIT POSTS OPTION
if(isset($_POST['update']) == TRUE)
{
    $articleId = $_POST['articleId'];

    // Prepare select statement
    $stmt = $db->prepare("select * from articles, users
                        where articleId = :articleId");
    // Bind articleId to passed $articleId variable                    
    $stmt->bindParam(":articleId", $articleId);

    // Execute the statement
    $stmt->execute();

    // get the row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $title = $row['articleName'];
    $content = $row['articleData'];

    ?>
    
    <!-- Form to display the content of a post and allow it to be eddited upon clicking update process is passed to the server side script -->
    <form action="./admin_process_update_post.php" method="POST">
        <input type="hidden" name="articleId" value="<?php echo $articleId; ?>">
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
    echo "Article ID: " . $articleId;
    echo "<br>Are you sure you want to delete this post?";
    echo "<br>If you wish to continue select 'delete', if you wish to return to the previous page click <a href:./admin_manage_posts.php>here<a/><br>";
    ?>

    <form action="./admin_process_delete_post.php" method="POST">
        <input type="hidden" name="articleId" value="<?php echo $articleId; ?>">
        <br>
        <input type="submit" value="delete">
    </form>
    
    <?php
}
// VIEW COMMENTS OPTION
if(isset($_POST['comments']) == TRUE)
{
    echo "Article ID: " . $articleId . " comments";
    
    // Display the comments for each article
    $comments = $db->prepare("select * from comments, users where articleId = :articleId and users.userId = comments.userId 
    order by commentDate ASC");

    // use the bindPara() function to bind :articleId in our sql statement to the variable held within our previous statement $row
    $comments->bindParam(':articleId', $articleId);

    // execute the comments statement
    $comments->execute();

    // Do the same type of loop that displays articles for comments
    while ($commentRow = $comments->fetch(PDO::FETCH_ASSOC))
    {
        $commentId = $commentRow['commentId'];
    ?>
        <!-- Form to display the content of a post and allow it to be eddited upon clicking update process is passed to the server side script -->
        <form action="./admin_process_delete_comment.php" method="POST">
        <input type="hidden" name="articleId" value="<?php echo $articleId; ?>">
        <input type="hidden" name="commentId" value="<?php echo $commentId; ?>">
            <div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;'>
                <p type="text" name="commentId" value=>Comment ID: <?php echo $commentId;?></p>
                <p type="text" name="comment"> Content: <?php echo $commentRow['commentData']; ?></p>
                <p type="text" name="user">Comment by: <?php echo $commentRow['username'] . " " .  $commentRow['commentDate']?></p>
                <input type="submit" value="delete">
            </div>
        </form>
    <?php
    }
}
include("./close_db.php");
include("./footer.php");
?>

<div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;'>