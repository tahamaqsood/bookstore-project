<?php 
include("header.php");
  ?>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside widget -->
					
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Price</h3>
						<div id="price-slider"></div>
					</div>
					<!-- aside widget -->


					
				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single -->
							<?php 
							$pro = $db->subcat_pro($_GET['subcat']);
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
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
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