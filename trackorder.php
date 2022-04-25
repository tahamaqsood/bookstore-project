<?php 
include('header.php');

 ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Track Order</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		
		<!-- container -->
		<div class="container">
			
			<!-- row -->
			<div class="row">
				

					<div class="col-md-12">
						

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Track Your Order</h4>
							</div>
							<form method="post" action="">
							<div class="form-group">
							<input class="input" type="text" name="order" placeholder="Enter Your Order Id" required="">

						</div>
						<div class="form-group">
							<button type='submit' name='submit' class='primary-btn'>Submit</button>
						</div>
						
					</form>
							
						</div>
					</div>

					<div class="col-md-12">
	<table class="table table-hover">
		<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Order_Number</th>
				<th>Order Status</th>

		</tr>
<?php 
	if (isset($_POST['submit'])) 
	{
		$track = $_POST['order'];
	$select = $db->track_order($track);
while ($row= mysqli_fetch_array($select)) 
	{
		echo "
				<tr>
					<td>$row[3]</td>
					<td>$row[4]</td>
					<td>$row[5]</td>
					<td>$row[8]</td>
					<td>$row[6]</td>
					<td>$row[1]</td>
					<td>$row[12]</td>
				
				</tr>

		";
	}	
		
}
?>
</table>
</div>

					
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
<?php 

include('footer.php');
 ?>
