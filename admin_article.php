<?php
include("./admin_header.php");
include("./connect_db.php");

if ($_SESSION['userRole'] != 'admin')
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
<!-- Article creation form -->
<form method="POST" action="./admin_process_article.php" enctype="multipart/form-data">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" required>

  <label for="content">Content:</label>
  <textarea id="content" name="content" rows="10" required></textarea>

  <label for="file_select">Select file:</label>
  <select name="file_select" id="file_select">
    <option value="">Select file</option>
      <?php
      // get list of all files uploaded
      $stmt = $db->query("select * from files");
      // loop through the files to display one by one
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        // set the option to fileId for uploading
        $fileId = $row["fileId"];
        $fileName = $row["fileName"];
        echo '<option value="' . $fileId . '">' . $fileName . '</option>';
      
        echo '</option>';
      }
  echo '</select>';
  
  // Set which members can view the post
  $stmt2 = $db->query("select posts.memberView from posts");
  ?>
  <label for="membership">Member Availability:</label>
  <select name="membership">
      <option value="free">Free</option>
      <option value="bronze" >Bronze</option>
      <option value="silver">Silver</option>
      <option value="gold">Gold</option>
  </select>                                    
  <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION["userId"] ;?>">
  <button type="submit">Submit</button>
</form>

<?php
}
include("./footer.php");
?>