<?php
include("./admin_header.php");
include("./connect_db.php");
?>
<script>

</script>

<?php
// Prepare select statement
$stmt = $db->prepare("select * from posts, users
where articles.userId = users.userId
order by articleDate DESC");

// Execute the statement
$stmt->execute();

// Loop through the results and display each article
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{

    ?>
    <form action="./admin_post_options.php" method="POST">

    <?php
        echo "<h3 name='articleId' >Article ID: " . $row['articleId'] . "</h3>";
        echo "<div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;'>";
        echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
        echo "<h4 id='title'><u>" . $row['articleName'] . "</u><h4>";
        echo "<input type='hidden' type='text' id='title' name='title' disabled>";
        echo "</div>";
        echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
        echo "<p class='text-left' id='content'><textarea id='content' name='content' rows='10' disabled>" . $row['articleData'] . "</textarea></p>";
        echo "<p class='text-center' id='user.date'>Author: " . $row['username'] .  "</br>" . $row['articleDate'] . "</p>";
        echo "</div>";
    ?>

    <!-- 
    Form to display options for each post, the options will be as such
    Update ( will allow admin to update the body of text within the article)
    Delete ( Will delete the article and all comments linked to the articleId)
    Comments ( Will allow admin to remove comments )
    -->

        <div style="text-align: left;">
        <input type="hidden" name="articleId" id="articleId" value="<?php echo $row['articleId'];?>">
        <button class="btn-danger" name="update" type="submit">Update Post</button>
        <button class="btn-danger" name="delete" type="submit">Delete Post</button>
        <button class="btn-danger" name="comments" type="submit">View Comments</button>
        </div>

    </form> <!--form-->
    <?php
    echo "</div>";
}


include("./footer.php");
?>