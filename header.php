<?php 
include('config/database.php');
$db = new connect();
session_start();
if (!isset($_SESSION['user_id'])=='') {
	$user = $db->db_select1("select * from tbl_user where id = $_SESSION[user_id] ");
foreach ($user as $p)
{}
}


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="dist/sweetalert2.min.css">
    <script src="dist/sweetalert2.all.min.js"> </script>


	<title>E-SHOP HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	
<link rel="stylesheet" href="css/style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to Shaharda Book Store!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="shop.php">Store</a></li>
						<li><a href="trackorder.php">Track Order</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">English (ENG)</a></li>
								<li><a href="#">Russian (Ru)</a></li>
								<li><a href="#">French (FR)</a></li>
								<li><a href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="./img/booklogo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form method="post" action="search.php">
							<input class="input search-input" name="search" type="text" required=""  placeholder="Enter your keyword">
							<select class="input search-categories" name="combo" required="">
								<option value="0">All Categories</option>
								<?php 
								$cat = $db->db_select1("select * from tbl_subcat where status='Active'");
								foreach ($cat as $c) {
								 echo "
								<option value='$c[id]'>$c[subcat_name]</option>
								";}
								?>
							</select>
							<button name="btn_sub" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						

						<?php  
							if (isset($_SESSION['user_name'])) 
							{
								echo "<li class='header-account dropdown default-dropdown'>
							<div class='dropdown-toggle' role='button' data-toggle='dropdown' aria-expanded='true'>
								<div class='header-btns-icon'>
									<i class='fa fa-user-o'></i>
								</div>
								<strong class='text-uppercase'>My Account <i class='fa fa-caret-down'></i></strong>
							</div>
							<a class='text-uppercase'>$p[firstname]</a>
							<ul class='custom-menu'>
								<li><a href='myaccount.php'><i class='fa fa-user-o'></i> My Account</a></li>
								<li><a href='myorders.php'><i class='fa fa-shopping-cart'></i> My Orders</a></li>
								<li><a href='wishlist.php'><i class='fa fa-heart-o'></i> My Wishlist</a></li>				
								<li><a href='php/logout.php'><i class='fa fa-unlock-alt'></i> Logout</a></li>			
							
							</ul>
						</li>";
						
						}
							else
							{
							echo "<li class='header-account dropdown default-dropdown'>
							<div class='dropdown-toggle' role='button' data-toggle='dropdown' aria-expanded='true'>
								<div class='header-btns-icon'>
									<i class='fa fa-user-o'></i>
								</div>
								<strong class='text-uppercase'>My Account <i class='fa fa-caret-down'></i></strong>
							</div>
							<a href='Accounts.php' class='text-uppercase'>Login</a> / <a href='Accounts.php' class='text-uppercase'>Join</a>
							<ul class='custom-menu'>
								<li><a href='Accounts.php'><i class='fa fa-unlock-alt'></i> Login</a></li>
								<li><a href='Accounts.php'><i class='fa fa-user-plus'></i> Create An Account</a></li>
							</ul>
						</li>";
							}
							?>
						<!-- /Account -->

						<!-- Cart -->
							<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty"><?php if (isset($_SESSION['scart'])) 
									{
										$c = count($_SESSION['scart']); echo $c;
									}
									else
									{
										echo 0;
									}?></span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<?php 
										if(!empty($_SESSION["scart"]))
										{
											$total = 0;
											foreach($_SESSION["scart"] as $keys => $values)
											{
											$total = $total + ($values["qty"] * $values["price"]);
											
										}
									}
									else
									{	$total = 0;
										echo $total ;
									}
										?>
									
								<span><?php echo number_format($total, 0); echo " Rs"?></span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">

										<?php 
										if(!empty($_SESSION["scart"]))
										{
											$total = 0;
											foreach($_SESSION["scart"] as $keys => $values)
											{

										?>

										<div class="product product-widget">
											<div class="product-thumb">
												<?php 
												$img = $db->getimg1($values['id']);
												foreach ($img as $i) 
												{
												echo "<img src='admin/images/$i[name]' alt=''>";
												}
												 ?>
												

											</div>
											<div class="product-body">
												<h3 class="product-price"><?php echo $values["price"];?> <span class="qty">x <?php echo $values["qty"] ?></span></h3>
												<h2 class="product-name"><a href="#"><?php echo $values["name"] ?></a></h2>
											</div>
											<a href="php/delete.php?action=delete&id=<?php echo $values["id"]; ?>" class="cancel-btn"><i class="fa fa-trash"></i></a>
										</div>
										<?php 
									}
								}
								else
								{
									echo "Cart Empty";
								}
										 ?>
									</div>
									<div class="shopping-cart-btns">
										<a href="php/emptycart.php" class="main-btn">Clear Cart</a>
										
										<a href="checkout.php" class="primary-btn"><i class="fa fa-arrow-circle-right"></i> Checkout</a>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<li class="dropdown side-dropdown">
							<?php 
							$cat = $db->db_select1("select * from tbl_subcat where status='Active'");
						
							foreach ($cat as $c) {
						
							echo "<a class='dropdown-toggle' data-toggle='dropdown' aria-expanded='true'>$c[subcat_name] <i class='fa fa-angle-right'></i></a>";
						}
							 ?>

				<div class='custom-menu'>

								<div class='row'>

									<div class='col-md-4'>

										<ul class='list-links'>
											<li>
												<h3 class='list-links-title'>Categories</h3></li>
							
											<li><a href='#'></a></li>
										
										</ul>
										<hr class='hidden-md hidden-lg'>
									</div>

									
							</div>

							
						</li>
						
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
			<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">Home</a></li>
						<li><a href="shop.php">Shop</a></li>
						<?php 
						$cat = $db->db_select1("select * from tbl_cat where status='Active'");
						
						foreach ($cat as $c) {
						

							echo "<li class='dropdown default-dropdown'><a class='dropdown-toggle' data-toggle='dropdown' aria-expanded='true'>$c[cname] <i class='fa fa-caret-down'></i></a>"; ?>
							<ul class='custom-menu'>
							<?php 
							$subcat=$db->db_select1("select * from tbl_subcat where category_id = '$c[id]' and status='Active'");
							foreach ($subcat as $ca) 
							{
							echo "
								<li><a href='products.php?subcat=$ca[id]'>$ca[subcat_name]</a></li>

								
							";
					}
					echo "</ul>
						</li>";
						}
						 ?>
						
						<li><a href="contactus.php">Contact us</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

