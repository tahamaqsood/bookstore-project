<?php 
include('header.php');
if (!isset($_SESSION['user_id'])) 
{
	echo "<script>window.location.href='Accounts.php'</script>";
}
$id = $_GET['id'];
$query = $db->select_order($id);
$rows = mysqli_fetch_array($query);
 ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Request Delete Order</li>
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
				
					<div class="col-md-6">
						<div class="billing-details">
							
							<div class="section-title">
								<h3 class="title">Request To Delete Order</h3>
							</div>
							<form method="post" action="php/deleteorder.php">
							
						
							<div class="form-group">
								<input class="input" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Please Enter Your Email Address" value='<?php echo $_SESSION['email'] ?>' required="" title="Must contain at @, and domain" readonly="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="subject" pattern="[A-Za-z1-9 ]{5,30}" title="Subject Should Be In Between 5 to 30 Alphabets" placeholder="Please Enter Your Subject" required="" >
							</div>
							
							<div class="form-group">
								<textarea class="input" name="msg" placeholder="Your Message" style="height: 100px"></textarea>
							</div>
							<input type="submit" name="btn_sub" value="Send Message" class="primary-btn">
							<?php 
							if (isset($_GET['msg'])) 
							{
							echo "<div class='alert alert-success'><strong>Successfully Send</strong></div>";
							}
							 ?>
							</form>
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
