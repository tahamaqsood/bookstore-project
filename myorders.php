<?php 
include('header.php');
if (!isset($_SESSION['user_id'])) 
{
	echo "<script>window.location.href='Accounts.php'</script>";
}
 ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">My Orders</li>
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
								<h4 class="title">My Orders</h4>
							</div>
							
							
						</div>
					</div>

					<div class="col-md-12">
	<table class="table table-hover">
		<tr>
				<th>Order Date</th>
				<th>Order Id</th>
				<th>Order Status</th>
				<th>Total</th>
				<th></th>
				<th></th>


		</tr>
<?php 
		
	$select = $db->db_select1("select * from tbl_order where user_id = $_SESSION[user_id]");
while ($row= mysqli_fetch_array($select)) 
	{
		?>
		
				<tr>
					<td><?php echo $row[9] ?></td>
					<td><?php echo $row[1] ?></td>
					<td><?php echo $row[14] ?></td>
					<td >Rs <?php echo number_format($row[12],0) ?>/-</td>
					<?php echo "<td><a href='vieworder.php?id=$row[0]' class='tooltip-info' data-rel='tooltip' title='View Details'>
						<span class='blue'>
						<i class='ace-icon fa fa-search-plus bigger-120'></i>
						</span>
					</a></td>";?>

					<?php 
					if ($row[14]=='Processing' || $row[14] =='Seen') {
						echo "<td><a href='deleteorder.php?id=$row[0]' class='tooltip-error' data-rel='tooltip' title='Cancel Order'>
						<span class='blue'>
						<i class='ace-icon fa fa-trash-o bigger-120'></i>
						</span>
						</a></td>";
					}
					else
					{
						echo "<td></td>";
					}
					 ?>
					
					
				
				</tr>

		<?php } ?>
		

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
