<?php
include("./connect_db.php");

// handle getting the file from the user input to the server directory
if(isset($_POST["submit"])) {
    // Get the files information
    $fileName = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];
    $file_error = $_FILES["file"]["error"];
    $userId = $_POST["userId"];

    // Get title and description
    $title = $_POST["title"];
    $description = $_POST["description"];

    // get image type, if image go to images directory if video go to media directory
    if(strpos($fileType, "image") !== false) {
        $directory = "./images/";
    } elseif(strpos($fileType, "video") !== false) {
        $directory = "./media/";
    }

    // Upload file to server
    $file_destination = $directory . $fileName;
    move_uploaded_file($file_tmp, $file_destination);

    // File successfully in the directory

    // Now insert the data in to the database

    // Insert data into database
    $stmt = $db->prepare("insert into files (fileName, filePath, fileType, title, description, userId) values (:fileName, :filePath, :fileType, :title, :description, :userId)");
    $stmt->execute(array(
        "fileName" => $fileName,
        "filePath" => $file_destination,
        "fileType" => $fileType,
        "title" => $title,
        "description" => $description,
        "userId" => $userId
    ));

    header("Location: ./admin_dash.php");
}

?>
