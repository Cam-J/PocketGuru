<?php
include("./admin_header.php");
include("./connect_db.php");

if($_SESSION['userRole'] != 'admin')
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

<h1 style="text-align: center;">Admin Home Page</h1>
    <h2 style="text-align: left;"><a href="./admin_userControl.php">Users: Click to view user options</h2>
	<!--Table Container-->
	<div class="row justify-content-left">
		<div class="col-auto">
			<table class="table table-hover table-sm table-responsive" id="users">
				<!--table head light design-->
				<thead class="thead-light">
					<!--define table rows-->
					<tr>
						<!--table headings for each row-->
						<th style="font-weight: bold;">ID</th>
						<th style="font-weight: bold;">User</th>
						<th style="font-weight: bold;">Name</th>
						<th style="font-weight: bold;">Address</th>
						<th style="font-weight: bold;">Email</th>
						<th style="font-weight: bold;">Role</th>
					</tr>
				</thead>

				<?php
				//Step 1: Prepare the statement to list all the users
				$stmt=$db->prepare("select * from users"); 

				//Step 2: Execute the statement and produce array of results
				$stmt->execute(array());
				
				//loop through the array assigning one row at a time 
				//to the $a_row variable, loop continues while rows exist
				while ($a_row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
                    //Display the table contents here
                    echo "<tr>"; 
                    echo "<td>$a_row[userId]</td>";							
                    echo "<td>$a_row[username]</td>";
                    echo "<td>$a_row[firstName] $a_row[lastName]</td>";
                    echo "<td>$a_row[address1] $a_row[address2] $a_row[postCode]</td>";
                    echo "<td>$a_row[email]</td>";
                    echo "<td>$a_row[userRole]</td>";
                    echo "</tr>";
                }?>
            </table>
        </div> <!--column-->
	</div> <!--row container-->
<?php
}
include("./close_db.php");
include("./footer.php");
?>