<?php 
include("header.php");
if (isset($_POST["btn_sub"])) 
{
	$cat = $_POST['combo'];
	$text = $_POST['search'];

	if ($cat=='0') {
		$select = $db->db_select1("select * from tbl_product where name= '$text'");
	}
	
	else
	{
		$select = $db->db_select1("select * from tbl_product where name= '$text' and id='$cat'");
	}
	

	
	foreach ($select as $search)
	{
		
	
 ?>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="section-title">
					<h3 class="title">Search Results</h3>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single -->
							<?php 
							$pro = $db->db_select1("select * from tbl_product where status='Active' and id = '$search[id]'");
						}}
							$count=1;
							foreach ($pro as $p) 
							{
								echo "<div class='col-md-4 col-sm-6 col-xs-6'>
								<div class='product product-single'>
									<div class='product-thumb'>
										
										<button class='main-btn quick-view'><i class='fa fa-search-plus'></i> Quick view</button>";
										?>

										<?php 
										$img = $db->getimg1($p['id']);
										foreach ($img as $i) {
										echo "<img src='admin/images/$i[name]' alt='' width='100' height='200'> </div>";
										}
										?>

									<?php 
									echo "<div class='product-body'>
										<h3 class='product-price'>Rs";?> <?php echo number_format($p['price'],0); ?>  <?php echo"<del class='product-old-price'></del></h3>
										<input type='hidden' name='qty' value='1'>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star-o empty'></i>
										</div>

										<h2 class='product-name'><a href='singleproduct.php?pid=$p[id]'>$p[name]</a></h2>
										<form method='post' action='php/wishlist.php'>
										<div class='product-btns'>
										<input type='hidden' class='input' name='id' value='$p[id]'>";?>
										<?php 
										if (isset($_SESSION['user_id'])) 
										{
										 	echo "<input type='hidden' class='input' name='userid' value='$_SESSION[user_id]'>";
										 } 
										 else
										 {
										 echo "<input type='hidden' class='input' name='' value=''>";
										 }
										 ?>
										<?php echo "
											<button class='main-btn icon-btn'  type='submit' style='float: left' name='btn_wishlist'><i class='fa fa-heart'></i></button></form>";?>

											<?php
											if ($p['quantity']>0) 
											{
																							
											echo "<form method='post' action='php/addcart.php'>
											<input type='number' name='qty' class='main-btn icon-btn' min='1' max='$p[quantity]' value='1'>
											<input type='hidden' class='input' name='id' value='$p[id]'>
											<input type='hidden' class='input' name='price' value='$p[price]'>
											<input type='hidden' class='input' name='name' value='$p[name]'>
											<button type='submit' name='btn_sub' class='primary-btn add-to-cart'><i class='fa fa-shopping-cart'></i> Add to Cart</button></form>
											
										</div>
									</div>
								</div>
							</div>";
						}
						else
						{
							echo "<button type='button' class='primary-btn add-to-cart'>Out Of Stock</button>
											
										</div>
									</div>
								</div>
							</div>";
						}
							
							if ($count%3==0)
							{
								echo "<div class='clearfix visible-md visible-lg visible-sm visible-xs'></div>";
							}
							$count++;
							}

									 ?>
							<!-- /Product Single -->

							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

 <?php

include("footer.php");
  ?>