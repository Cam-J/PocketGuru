<?php
include("./admin_header.php");
?>

<!-- Article creation form -->
<form method="POST" action="./admin_process_article.php">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" required>

  <label for="content">Content:</label>
  <textarea id="content" name="content" rows="10" required></textarea>

  <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION["userId"] ;?>">

  <button type="submit">Submit</button>
</form>




<?php
include("./footer.php");
?>