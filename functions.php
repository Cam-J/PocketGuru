<?php
//Function convert date from YYYY-MM-DD HH:MM:SSS to DD-MM-YYYY
function formatDate($date)
{
    //constituent components of the date
    // SUBSTR() <- returns part of the string
    // So this is going to take $date from the start (0) then 4 places 
    // which takes the $year variable, and so on for $month and $day.
    // Once these have been found we can then re-format it. 
    $year = substr($date, 0, 4);
    $month = substr($date, 5, 2);
    $day = substr($date, 8, 2);

    //new format
    $newFormat = $day."/".$month."/".$year ;
    //Return new format 
    return $newFormat ;

}
?>
<?php
//Function to reformat name to First Initial and last name
function formatName($name)
{
    //Find first initial in name.
    $firstInitial = ($name [0]);
    //Use strpos() to locate the space inside the name, and display everything
    //that is 1 character ahead. 
    // so we are going in to the $name variable
    // we are picking out the space with strpos()
    // and then we are displaying whatever is following the space. 
    $lastName = substr($name, strpos($name, " ")+1);

    //New format
    $newFormat = $firstInitial." ".$lastName ;
    return $newFormat ;
}

function display_gold()
{
    if ($_SESSION['membership'] == 'gold' )
    {

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
    }
}

function display_silver()
{
    if ($_SESSION['membership'] == 'silver')
    {
        $stmt = $db->prepare("select * from posts, users
        where posts.userId = users.userId
        and posts.memberView <> gold
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
    }
}

function display_bronze()
{
    if($_SESSION['membership'] == 'bronze')
    {
        $stmt = $db->prepare("select * from posts, users
        where posts.userId = users.userId
        and posts.memberView <> gold and silver
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
    }
}

function display_free()
{
    if($_SESSION['membership'] == 'free')
    {
        $stmt = $db->prepare("select * from posts, users
        where posts.userId = users.userId
        and posts.memberView == 'free'
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
    }
}