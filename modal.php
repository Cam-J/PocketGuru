<?php
/*
A simple Modal solution
Checkout:- https://en.wikipedia.org/wiki/Modal_window
*/

?>
<!DOCTYPE html>
<html>

<head>

	<title>Session Data</Datag></title>
	
	<!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<!-- The modal Javascript function -->
	<script type="text/javascript">
                  $(window).on('load',function(){
                  $('#myModal').modal('show');
                  });
	</script>
	
</head>

<body>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Cookies</h4>
      </div>
      <div class="modal-body">
        <p>This site uses Session data to control and enhance the customer experience. By continuing to use this site you confirm your acceptance of the use of Session data.</p>
		<p>Logging out of the site or closing the browser will automatically end the session.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>

</html>
