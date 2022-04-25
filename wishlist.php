<?php 
include("header.php");
$id =$_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) 
{
	echo "<script>window.location.href='Accounts.php'</script>";
}

 ?>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Whishlist</li>
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
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Whishlist</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>

										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
$query = $db->db_select1("select * from tbl_wishlist where user_id='$id'");
foreach ($query as $q)  
{
$pro = $db->getsignlepro($q['product_id']);
foreach ($pro as $p) {
	$img = $db->getimg1($p['id']);

								foreach ($img as $i) {

									
									 ?>
									<tr>
										<?php echo "<td class='thumb'><img src='admin/images/$i[name]' alt=''></td>";} ?>
										<td class="details">
											<?php echo "<a href='singleproduct.php?pid=$p[id]'>$p[name]</a>" ?>
											
										</td>
										<td class="price text-center"><strong><?php echo number_format($p['price'],0); ?></strong><br></td>
										
										<td class="text-right">
										<form method="post" action="php/deletewhishlist.php">
										<input type="hidden" name="proid" value="<?php echo $p['id']; ?>">
										<input type="hidden" name="userid" value="<?php echo $id; ?>">
										<button type="submit" name="delete" class="main-btn icon-btn"><i class="fa fa-close"></i>
										</button>
											</form>
										</td>
									</tr>
									<?php }} ?>
									
								</tbody>
							
							</table>
							<?php  
													if (isset($_GET['fail'])) 
													{
													echo "<div class='alert alert-danger'><strong>Product Already Added</strong></div>";
													}
													elseif(isset($_GET['success']))
													{
													
													echo "<div class='alert alert-success'><strong>Product Added</strong></div>";
																											
													}
														?>
														<?php  
													if (isset($_GET['deletefailed'])) 
													{
													echo "<div class='alert alert-danger'><strong>Product Not Deleted</strong></div>";
													}
													elseif(isset($_GET['deletesuccess']))
													{
													
													echo "<div class='alert alert-success'><strong>Product Deleted</strong></div>";
																											
													}
														?>
													
						</div>

					</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php 

include("footer.php");
 ?>