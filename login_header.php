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

  <title>the Local Theatre Company</title>
</head>

<body>

	<div class="container-fluid no-padding"> <!-- containers are 1200px wide with default 15px padding -->
		<div class="row">
		  <div class="col-md-12">

			<img class="img-fluid float-center img-responsive" src="./images/header.jpg" alt="the Local Theatre Company header image, a view of the stage" width="100%"/>

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
        if ($_SESSION['userRole'] == "admin")
        {
            echo "<p class=\"list-group-item list-group-item-action bg-light\"style=\"color: Black;\">Welcome " . $_SESSION['username'] . "</p>";
            ?>
            <a href="./index.php" class="list-group-item list-group-item-action bg-light" style="color: black; ">Home Page</a>
            <a href="./logout.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Logout</output></a>
            <a href="./theScene.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Announcements</a>
            <a href="./products.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Store</a>
            <a href="./touchGallery.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Gallery</a>
            <a href="./update_user.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Account</a>
            <a href="./privacy_policy.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Privacy Policy</a>
            <?php
        
        }
        else
        {
          echo "<p class=\"list-group-item list-group-item-action bg-light\"style=\"color: Black;\">Welcome " . $_SESSION['username'] . "</p>";
          ?>
          <a href="./index.php" class="list-group-item list-group-item-action bg-light" style="color: black; ">Home Page</a>
          <a href="./logout.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Logout</output></a>
          <a href="./theScene.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Announcements</a>
          <a href="./products.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Store</a>
          <a href="./touchGallery.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Gallery</a>
          <a href="./update_user.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Account</a>
          <a href="./privacy_policy.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Privacy Policy</a>
          <?php
        }
      }
      else
      {
		    echo "<p class=\"list-group-item list-group-item-action bg-light\" style=\"color: Black; \">Site Menu</p>";
        ?>
        <a href="./index.php" class="list-group-item list-group-item-action bg-light" style="color: black; ">Home Page</a>
		    <a href="./login.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Login</a>
        <a href="./register.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Register</a>
        <a href="./touchGallery.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Gallery</a>
        <a href="./privacy_policy.php" class="list-group-item list-group-item-action bg-light" style="color: black;">Privacy Policy</a>
        <?php    
      }
      ?>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Navigation (RHS) Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-danger" id="menu-toggle"> Show/Hide Menu </button>

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
        else
        {
        ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./logout.php">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./privacy_policy.php">Privacy Policy</a>
              </li>
            </ul>
          </div>
        </nav>
      <?php
        }
      }
      else
      {
      ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: black;" href="./add_customer.php">Register</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" style="color: black;" href="./privacy_policy.php">Privacy Policy</a>
              </li>
            </ul>
          </div>
        </nav>
      <?php
      }
      ?>  
      <div class="container-fluid">
        <h1 style="text-align: center; color: darkred;">the Local Theatre Company</h1>