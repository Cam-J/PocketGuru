<?php
include("./header.php");
include("./connect_db.php");
?>
<h1 style="text-align: center;"> the Scene </h1>

<!-- select all articles created and display them for viewing -->
<?php
// echo "<p>" . $_SESSION['userRole'] . "</p>";
// Prepare select statement
$stmt = $db->prepare("select * from articles, users
where articles.userId = users.userId
order by articleDate DESC");

// Execute the statement
$stmt->execute();

// Loop through the results and display each article
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
                echo "<div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;'>";
                echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
                echo "<h4><u>" . $row['articleName'] . "</u><h4>";
                echo "</div>";
                echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
                echo "<p class='text-left'>" . $row['articleData'] . "</p>";
                echo "<p class='text-center'>Author: " . $row['username'] .  "</br>" . $row['articleDate'] . "</p>";
                echo "</div>";
                
                // Display the comments for each article
                $comments = $db->prepare("select * from comments, users where articleId = :articleId and users.userId = comments.userId 
                                        order by commentDate ASC");
                // use the bindPara() function to bind :articleId in our sql statement to the variable held within our previous statement $row
                $comments->bindParam(':articleId', $row['articleId']);
                // execute the comments statement
                $comments->execute();

                // Do the same type of loop that displays articles for comments
                while ($commentRow = $comments->fetch(PDO::FETCH_ASSOC))
                {
                        echo "<div style='padding: 4px; margin-bottom: 5px;'>";
                        echo "<p>" . $commentRow['commentData'] . "</p>";
                        echo "<p>Comment by: " . $commentRow['username'] .  "</br>" . $commentRow['commentDate'] . "</p>";
                        echo "</div>";
                }

                // user control, if user is suspended hide the comment form, if user is admin or user display comment form
                    // Allow users to add a comment to a post, placeholder until fixed but only users and admins will have the ability to comment.
                    if(isset($_SESSION['userId']))
                    {
                        if (($_SESSION['userRole'] == "admin") or ($_SESSION['userRole'] == "user"))
                        {
                        ?>
                        <div class="container-fluid">
                        <form action="./process_comments.php" method="POST">
                            <fieldset>
                            <div class="form-group">
                                <input type="hidden" name="articleId" id="articleId" value="<?php echo $row["articleId"] ;?>">
                                <label class="form-control-label" for="comment" style="font-weight: bold;">Comment:</label>
                                <input class="form-control" type="textarea" name="content" id="content" placeholder="Comment here: " required>
                            </div>
                            </fieldset>
                                <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION["userId"] ;?>">
                                <input type="hidden" name="articleId" id="articleId" value="<?php echo $row["articleId"] ;?>">
                                <!--form button-->
                                <div style="text-align: left;">
                                <button class="btn-border" type="submit">Submit</button>
                            </div>
                        </form> <!--form-->
                        </div><!--container-->
                        <?php
                        }
                    }
                    else{}   
            echo "</div>";
}

include("./footer.php");
?>