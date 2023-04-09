<?php
include("./admin_header.php");
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
include("./footer.php");
?>
