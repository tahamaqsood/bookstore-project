
<?php 
include('header.php');
$id = $_GET['id'];
$query = $db->select_order($id);
$rows = mysqli_fetch_array($query);

if ($rows[13]==0) 
{
	$msg='Free Shipping';
}
else
{
	$msg=' Included 100 Rs Shipping Charges';
}
 ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Order Summary</li>
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
				

					<div class="col-md-8">
						

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Order Summary</h4>
							</div>
<?php
echo "<script>
swal.fire({
	title: 'Shopping Completed',
	text: 'Thank you for shopping',
	icon: 'success',
	showConfirmButton: true,
	confirmButtonColor: 'blue',
	timer: 2000
});
</script>";
?>
						<table class="table table-hover">
<tr>
	<td>Order Id</td>
	<td><strong><?php echo $rows[1]; ?></strong></td>
</tr>
<tr>
	<td>Order Date</td>
	<td><strong><?php echo $rows[9]; ?></strong></td>
</tr>	

<tr>
	<td>First Name</td>
	<td><strong><?php echo $rows[3] ?></strong></td>
</tr>

<tr>
	<td>Last Name</td>
	<td><strong><?php echo $rows[4] ?></strong></td>
</tr>

<tr>
	<td>Email</td>
	<td><strong><?php echo $rows[5] ?></strong></td>
</tr>

<tr>
	<td>Phone</td>
	<td><strong><?php echo $rows[8] ?></strong></td>
</tr>	

<tr>
	<td>Adress</td>
	<td><strong><?php echo $rows[6]  ?></strong></td>
</tr>	
	



<tr>
	<td>Total Bill</td>
	<td><strong><?php echo "Rs ". number_format($rows[12],0) ." +" .$msg; ?></strong></td>
</tr>	
	


</table>
							
						</div>
					</div>
				</div>
					
<div class="col-md-12">
															<div class="payments-methods">
															</div>
																
																
															</div>

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
