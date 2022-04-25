<?php 
include("header.php");
$id = $_GET['pid'];


 ?>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<?php 
								$pro = $db->getsignlepro($_GET['pid']);
								foreach ($pro as $p) {
								$img = $db->getimg1($p['id']);
								foreach ($img as $i) {
								echo "<img id='bigimg' src='admin/images/$i[name]' alt='' width='200' height='500' '>";
								}
								}
								?>
							</div>
							
						</div>

						<div id="product-view">
							
								<?php 
								$pro = $db->getsignlepro($_GET['pid']);
								foreach ($pro as $p) {
								$img = $db->getimg($p['id']);
								foreach ($img as $i) {
								echo "<div class='product-view'> <img onClick='ch(this.src)' src='admin/images/$i[name] ' alt=''></div>";
								}
								}
						?>

							
							
						</div>
					</div>
					<?php 
					$pro = $db->getsignlepro($_GET['pid']);
					foreach ($pro as $p) {
						echo "<div class='col-md-6'>
						<div class='product-body'>
						
							<h2 class='product-name'>$p[name]</h2>
							<h3 class='product-price'>Rs";?> <?php echo number_format($p['price'],0); ?> <?php echo"</h3>
							<div>
								<div class='product-rating'>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star-o empty'></i>
								</div>
								<a href='#'>3 Review(s) / Add Review</a>
							</div>";?>
							

							<p><strong>Availability:</strong><?php 
							if ($p['quantity']<=0)
							 {
								echo " Out Of Stock";
							}
							else
							{
								echo " In Stock";
							}
							 ?></p>
							
							<?php echo"
							<p><strong>Product Code: $p[product_code]</strong></p>
							<p>$p[short_description]</p>
							<div class='product-options'>
								
							</div>

							
								";?>
								<?php 
								if ($p['quantity']>0) 
								{
									echo "<form method='post' action='php/addcart.php'>
		

							<div class='product-btns'>
								<div class='qty-input'>
									<span class='text-uppercase'>QTY: </span>
									<input class='input' name='qty' type='number' value='1' min='1' max='$p[quantity]'>
									<input type='hidden' class='input' name='id' value='$p[id]'>
									<input type='hidden' class='input' name='price' value='$p[price]'>
									<input type='hidden' class='input' name='name' value='$p[name]'>
									
								</div>
								<button type='submit' name='btn_sub' class='primary-btn add-to-cart'><i class='fa fa-shopping-cart'></i> Add to Cart</button></form>";
								}
								else
								{
									echo "<button type='button' class='primary-btn add-to-cart'>Out Of Stock</button>";
								}
								
								
							
					
					 ?>
								<div class='pull-right'>
									<form method="post" action="php/wishlist.php">
									
									<input type='hidden' class='input' name='id' value='<?php echo $p['id'] ?>'>
									<input type='hidden' class='input' name='userid' value='<?php echo $_SESSION['user_id'] ?>'>

									<button class='main-btn icon-btn'  type="submit" name="btn_wishlist"><i class='fa fa-heart'></i></button>
									<button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
									<button class='main-btn icon-btn'><i class='fa fa-share-alt'></i></button>
									</form>

									
									
								<?php } ?>

								</div>
							</div>
						</div>
							
					</div>
					
					<div class='col-md-12'>
						<div class='product-tab'>
							<ul class='tab-nav'>
								<li class='active'><a data-toggle='tab' href='#tab1'>Description</a></li>
		
								<li><a data-toggle='tab' href='#tab2'>Reviews (<?php $query = $db->count($_GET['pid']); 
									while ($row = mysqli_fetch_array($query)) 
									{
										echo $row['0'];
									} ?>)</a></li>
							</ul>
							<div class='tab-content'>
								<div id='tab1' class='tab-pane fade in active'>

									<?php 
									$pro = $db->getsignlepro($_GET['pid']);
									foreach ($pro as $p) {
									echo "<p>$p[description]</p>";
									}
									?>
								</div>
								<div id='tab2' class='tab-pane fade in'>

									<div class='row'>
										<div class='col-md-6'>
											<div class='product-reviews'>
												<?php 
												$pro = $db->getreviews($_GET['pid']);
												$count=0;
												foreach ($pro as $p)  
												{
													
													
												
												 ?>

												<div class='single-review'>
													<div class='review-heading'>
														<div><a><i class='fa fa-user-o'></i><?php echo " $p[name]"; ?></a></div>
														<div><a><i class='fa fa-clock-o'></i><?php echo " $p[datetime]"; ?></a></div>
														<div class='review-rating pull-right'>
														<?php 
														for ($i=1; $i <=$p['rating'] ; $i++) { 
															echo "<i class='fa fa-star'></i>";
														}
														 ?>
														
														</div>
													</div>
													<div class='review-body'>
														<p><?php echo $p['review'] ?></p>
													</div>
												</div>

												<?php 
												} 
												?>
												<ul class='reviews-pages'>
													<li class='active'>1</li>
													<li><a href='#'>2</a></li>
													<li><a href='#'>3</a></li>
													<li><a href='#'><i class='fa fa-caret-right'></i></a></li>
												</ul>
											</div>
										</div>
										<div class='col-md-6'>
											<h4 class='text-uppercase'>Write Your Review</h4>
											<p>Your email address will not be published.</p>

											<form class='review-form' method="post" action="php/review.php">
												<div class='form-group'>
													<input class='input' type='text' required="" name="name" pattern="[A-Za-z]{3,}" title="Must contain at least three alphabets, and no number is allowed" placeholder='Your Name' />
												</div>
												<div class='form-group'>
													<input class='input' required="" type='email' name="email" placeholder='Email Address' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must contain at @, and domain" />
												</div>
												<div class='form-group'>
													<textarea class='input' required="" name="review" placeholder='Your review' pattern="[A-Za-z1-9 ]{5,30}" title="Subject Should Be In Between 5 to 30 Alphabets"></textarea>
												</div>
												<div class='form-group'>
													<input type="hidden" name="date" value="<?php echo date("jS M Y / h:i"); ?>">
												</div>
												<div class='form-group'>
													<input type="hidden" name="id" value="<?php echo $id;?>">
												</div>
												<div class='form-group'>
													<div class='input-rating'>
														<strong class='text-uppercase'>Your Rating: </strong>
														<div class='stars'>
															<input type='radio' id='star5'  name='rating' value='5' /><label for='star5'></label>
															<input type='radio' id='star4' name='rating' value='4' /><label for='star4'></label>
															<input type='radio' id='star3' name='rating' value='3' /><label for='star3'></label>
															<input type='radio' id='star2' name='rating' value='2' /><label for='star2'></label>
															<input type='radio' id='star1' name='rating' value='1' /><label for='star1'></label>
														</div>
													</div>
												</div>
												<input type="submit" name="btn_review" class='primary-btn' value="Submit">
											</form>

										</div>
									</div>



								</div>
							</div>
						</div>
					</div>
					

				</div>
				<!-- /Product Details -->
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
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<?php 
							$pro = $db->db_select1("select * from tbl_product where status='Active' ORDER BY RAND()LIMIT 4");
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
										echo "<img src='admin/images/$i[name]' alt=''> </div>";
										}
										?>

									<?php 
									echo "<div class='product-body'>
										<h3 class='product-price'>Rs $p[price] <del class='product-old-price'></del></h3>
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
						}}?>
			<!-- /Product Single -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


 <?php 
include("footer.php");
  ?>
  <script type="text/javascript">
									function ch(a)
									{
										document.getElementById('bigimg').src=a;
									}
								</script>