<?php
include("./admin_header.php");
include("./functions.php");
?>
<?php
// Check user is logged in
// If session is set, and the current user is an admin, display users
// If the user is anything else, no access
if($_SESSION['userRole'] != 'admin')
{
    // Session is not set, user required to login/register.
    echo "<h5 style='text-align: center;'><br> Hey there, it looks like you are trying to access something you shouldn't!</h5><br/>";
    echo "<p style='text-align: center;'> If you wish to view the contents of this page then you must be an admin.</p>";
	echo "<p style='text-align: center;'> Admins: Select the 'Login' option from the side bar menu or click <a href=\"./login.php\">here to login</a>.</p.<br/> ";
	echo "<p style='text-align: center;'> Mysterious user who wandered in to this location: <a href=\"./index.php\">click here!</a>.</p> ";
}
else
{
    //  User is logged in 
    // 	Contents of page can be displayed
	include("./connect_db.php") ;
	?>
	<!--Table Container-->
	<div class="row justify-content-center">
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
                        <th style="font-weight: bold; width: 400px;">New Role</th>
						<th style="font-weight: bold;">Membership</th>
                        <th style="font-weight: bold; width: 400px;">Updated Membership</th>

					</tr>
				</thead>

				<?php
				//Step 1: Prepare the statement to list all the users
				$stmt=$db->prepare("select * from users"); 

				//Step 2: Execute the statement and produce array of results
				$stmt->execute(array());
				?>

				<?php
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
						echo "<td>$a_row[userRole]</td>";?>
                        <!-- Table exists to allow admins to select a new role for a user and update it to the database -->
                        <td>
                            <form action="./admin_process_update_user.php" method="post">
                                <select name="userRole">
                                    <option value="admin" <?php if($a_row["userRole"]=="admin") echo "selected" ?>>Admin</option>
                                    <option value="user" <?php if($a_row["userRole"]=="user") echo "selected" ?>>User</option>
                                    <option value="suspended" <?php if($a_row["userRole"]=="suspended") echo "selected" ?>>Suspended</option>
                                </select>                                    
                                <input type="hidden" name="userId" value="<?php echo $a_row["userId"] ?>">
                                <input type="submit" value="Update">
                            </form>
                        </td>
						<?php echo "<td>$a_row[membership]</td>";?>
						<td>
                            <form action="./admin_process_update_membership.php" method="post">
                                <select name="membership">
                                    <option value="Gold" <?php if($a_row["membership"]=="gold") echo "selected" ?>>Gold</option>
                                    <option value="Silver" <?php if($a_row["membership"]=="silver") echo "selected" ?>>Silver</option>
                                    <option value="Bronze" <?php if($a_row["membership"]=="bronze") echo "selected" ?>>Bronze</option>
									<option value="Free" <?php if($a_row["membership"]=="free") echo "selected" ?>>Free</option>
                                </select>                                    
                                <input type="hidden" name="userId" value="<?php echo $a_row["userId"] ?>">
                                <input type="submit" value="Update">
                            </form>
                        </td>
                        <?php
						echo "</tr>";
						//End while loop
                    }
				?>
    		</table>
        </div> <!--column-->
	</div> <!--row container-->
	<?php
	include("./close_db.php");
}
include("./footer.php") ;
?>
