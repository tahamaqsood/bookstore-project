<?php 
include('headerhome.php');

// $query = "select * from tbl_product";
// $result = mysqli_query($conn,$query);
// $data = mysqli_fetch_assoc($result);
 ?>
	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container" >
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick" >
					<!-- banner -->
					<div class="banner banner-1" >
						<img src="./img/banner1.jpg" alt="">
						<div class="banner-caption text-center">
							
						
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="./img/banner2.jpg" alt="">
						<div class="banner-caption">
							
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="./img/banner3.jpg" alt="">
						<div class="banner-caption">
							
						</div>
					</div>
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="./img/mybanner1.png" alt="">
						
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="./img/mybanner2.png" alt="">
						
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
					<a class="banner banner-1" href="#">
						<img src="./img/mybanner3.png" alt="">
						
					</a>
				</div>
				<!-- /banner -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Featured Products</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="./img/banner04.png" alt="">
						<div class="banner-caption">
							
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">

							<!-- Product Single -->
							<?php 
							$pro = $db->db_select1('select * from tbl_product where status = "Active" and featurepro="yes"');
							foreach ($pro as $p) 
							{
								echo "<div class='product product-single'>
								<div class='product-thumb'>
									<div class='product-label'>
										
									</div>
								
									<a href='singleproduct.php?pid=$p[id]' class='main-btn quick-view'><i class='fa fa-search-plus'></i> Quick view</a>";
									?>
									<?php 
									$img = $db->getimg1($p['id']);
										foreach ($img as $i) {
									 echo "

									<img src='admin/images/$i[name]' alt=''>";
								}?>

								<?php  
								echo "
								</div>
								<div class='product-body'>
									<h3 class='product-price'>Rs ";?> <?php echo number_format($p['price'],0); ?><?php echo"</h3>
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
										<input type='hidden' class='input' name='id' value='$p[id]'>
										";?>
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

											<button class='main-btn icon-btn' style='float: left' type='submit' name='btn_wishlist'><i class='fa fa-heart'></i></button>
											</form>";?>

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
							</div>";
						}
						else
						{
							echo "<button type='button' class='primary-btn add-to-cart'>Out Of Stock</button>
											
										
									</div>
								</div>
							</div>";
						}}?>
							
							<!-- /Product Single -->

							
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->

				<?php 
				$pro = $db->db_select1('select * from tbl_product where status = "Active" limit 8');
				$count=1;
				foreach ($pro as $p) 
				{
					echo "<div class='col-md-3 col-sm-6 col-xs-6'>
					<div class='product product-single'>
						<div class='product-thumb'>
							<button class='main-btn quick-view'><i class='fa fa-search-plus'></i> Quick view</button>";
							?>
							<?php 
									$img = $db->getimg1($p['id']);
										foreach ($img as $i) {
									 echo "
							<img src='admin/images/$i[name]' alt=''>";
						}?>
						<?php 

						 echo "
						</div>
						<div class='product-body'>
							<h3 class='product-price'>Rs";?> <?php echo number_format($p['price'],0); ?><?php echo"</h3>
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
										<input type='hidden' class='input' name='id' value='$p[id]'>
										";?>
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

											<button class='main-btn icon-btn' style='float: left' type='submit' name='btn_wishlist'><i class='fa fa-heart'></i></button>
											</form>";?>

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
							</div>";}
							else
						{
							echo "<button type='button' class='primary-btn add-to-cart'>Out Of Stock</button>
											
										</div>
									</div>
								</div>
							</div>";
						}
				if ($count%4==0)
							{
								echo "<div class='clearfix visible-md visible-lg visible-sm visible-xs'></div>";
							}
							$count++;
							}
				?>

				<!-- /Product Single -->


				
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


	<?php 
	include('footer.php');
	 ?>