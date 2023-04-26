<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script type="text/javascript"
		src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart'],'language':'ru'}]}">
	</script>

	<link rel="stylesheet" type="text/css" href="style/mainstyle.css">


	<script type="text/javascript">
	  //load api package
	  google.load('visualization', '1', {packages: ['corechart']});

	</script>
  <!-- The modal Javascript function -->
	<script type="text/javascript">
                  $(window).on('load',function(){
                  $('#myModal').modal('show');
                  });
	</script>

  <title>the Pocket Admin Space</title>
</head>

<body>

	<div class="text-center"> <!-- containers are 1200px wide with default 15px padding -->
		<div class="row">
		  <div class="col-md-12">

			<img class="img-fluid float-center img-responsive" src="./images/admin.jpg" alt="Admin page" style="width: 50%; height: 400px;"/>

		  </div> <!-- col -->
		</div> <!-- row -->
	</div><!-- container -->

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">

      <?php
      // Display users name via cookies when they are logged in
      if(isset($_SESSION['userId']))
      {
        echo "<p class=\"list-group-item list-group-item-action bg-light\"style=\"color: Black;\">Welcome " . $_SESSION['username'] . "</p>";
        ?>
        <a href="./index.php" class="list-group-item list-group-item-action bg-light" style="color: black; ">Home Page</a>
        <a href="./logout.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Logout</output></a>
        <a href="./admin_article.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Add Post</a>
        <a href="./admin_manage_posts.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Manage Posts</a>
        <a href="./admin_uploadMedia.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Upload Media</a>
        <a href="./admin_userControl.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Moderate Users</a>
        <a href="./admin_viewOrders.php" class="list-group-item list-group-item-action bg-light" style="color: black;">View Orders<a>
        <?php
      }
		?>
      


      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Navigation (RHS) Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-info" id="menu-toggle"> Show/Hide Menu </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <?php
    if(isset($_SESSION['userId']))
    {
        if ($_SESSION['userRole'] == "admin")
        {
        ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./admin_dash.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./userControl.php">Users</a>
              </li>
            </ul>
          </div>
        </nav>
        <?php
        }
    }
        ?>
    <div class="container-fluid">
    <h1 style="text-align: center; color: DarkCyan;"><u>The Pocket Guru: Admin View</u></h1>
