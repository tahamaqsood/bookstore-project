<?php 
include('header.php');
$id = $_GET['id'];
$query = $db->select_order($id);
$rows = mysqli_fetch_array($query);

if ($rows[11]=0) 
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
															<div class="section-title">
																<h4 class="title">Products Ordered</h4>
															</div></div>
																<table class="shopping-cart-table table">
																	<thead>
																		<tr>
																			<th></th>
																			<th>Product</th>
																			
																			<th class="text-center">Price</th>
																			<th class="text-center">Quantity</th>
																			
																			<th class="text-right"></th>
																		</tr>
																	</thead>
																	<tbody>
																		
															<?php  
															$query = $db->db_select1("select * from tbl_orderdetails where order_id='$rows[1]'");
															
															foreach ($query as $q)  
															{

															$pro = $db->db_select1("select * from tbl_product where id='$q[product_id]'");

															foreach ($pro as $p) {
															
															$img = $db->db_select1("select * from tbl_image where product_id='$p[id]'limit 1");
															foreach ($img as $i)
															{
															?>

																		<tr>
																		<?php echo "<td class='thumb'><img src='admin/images/$i[name]' alt=''></td>";} ?>
																		<td ><strong><?php echo $p['name']; ?></strong></td>

																		<td class="price text-center"><strong>Rs <?php echo $p['price'] ?></strong></td>
																			<td class="qty text-center"><strong><?php echo $q['quantity'] ?></strong></td>
																			
																		</tr>

																		
																<?php 
																}} ?>			
																		</tbody>
																		
																</table>

																
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
