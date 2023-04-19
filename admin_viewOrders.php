<?php
include("./admin_header.php");
include("./connect_db.php");
?>
<div class="row justify-content-center">
		<div class="col-auto">
			<table class="table table-hover table-sm table-responsive" id="orders">
				<!--table head light design-->
				<thead class="thead-light">
					<!--define table rows-->
					<tr>
						<!--table headings for each row-->
						<th style="font-weight: bold;">Order ID</th>
						<th style="font-weight: bold;">Customer Email</th>
						<th style="font-weight: bold;width: 150px;">Date Ordered</th>
                        <th style="font-weight: bold;">Product ID</th>
						<th style="font-weight: bold;">Product Name</th>
						<th style="font-weight: bold;">Quantity</th>
                        <th style="font-weight: bold;">Price</th>
					</tr>
				</thead>
                <?php
                // Prepare statement to list all orders and details
                $stmt = $db->prepare("select * from orders, orderdetails where orders.orderId = orderdetails.orderId");
                
                // Execute the statement and produce an array
                $stmt->execute(array());

                //loop through the array assigning one row at a time 
				//to the $a_row variable, loop continues while rows exist
                while ($a_row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    //Display the table contents here
						echo "<tr>"; 
						echo "<td>$a_row[orderId]</td>";							
                        echo "<td>$a_row[email]</td>";
						echo "<td>$a_row[date_of_order]</td>";
                        echo "<td>$a_row[productId]</td>";
						echo "<td>$a_row[productName]</td>";
						echo "<td>$a_row[quantity]</td>";
                        echo "<td>$a_row[price]</td>";
                        echo "</tr>";
                }?>
        </div> <!-- Class -->
</div> <!-- Class -->
<?php
include("./footer.php");
include("./close_db.php");
?>
