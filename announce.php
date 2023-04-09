<?php
include("./header.php");
include("./connect_db.php");
?>
<h1 style="text-align: center;"> Announcements </h1>

<!-- select all articles created and display them for viewing -->
<?php
// echo "<p>" . $_SESSION['userRole'] . "</p>";
// Prepare select statement
$stmt = $db->prepare("select * from posts, users
where posts.userId = users.userId
order by created_at DESC");

// Execute the statement
$stmt->execute();

// Loop through the results and display each article
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo "<div style='border: 1px solid black; padding: 10px; margin-bottom: 20px;'>";
    echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
    echo "<h4><u>" . $row['title'] . "</u><h4>";
    echo "</div>";
    // if a file is attatched to the post display with new format
    if ($fileId = $row['fileId'] >= 1)
    {
        $image = $db->prepare("select * from files where fileId=:id");
        $image->execute(array(":id" => $row["fileId"]));
        $imagerow = $image->fetch(PDO::FETCH_ASSOC);
        // DISPLAY IMAGE
        echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
        echo "<div style='display: inline-block; width: 100%; margin-right: 20px;'>";
        echo "<img src='images/" . $imagerow['fileName'] . "' style='float: right; margin: 0 0 10px 10px; max-width: 50%;'>";
        echo "<p class='text-left' style='margin: 0;'>";
        echo "<p class='text-left'>" . $row['content'] . "</p>";
        echo "</div>";
    }
    else
    {
        echo "<div style='border: 1px solid black; padding: 5px; margin-bottom: 10px;'>";
        echo "<p class='text-center'>" . $row['content'] . "</p>";
    }
    echo "<p class='text-center'>Author: " . $row['username'] .  "</br>" . $row['created_at'] . "</p>";
    echo "</div>";   
    echo "</div>";

}

include("./footer.php");
?>