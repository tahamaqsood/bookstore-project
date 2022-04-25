<?php 

include('header.php');
 ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Accounts</li>
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
								<h3 class="title">Login</h3>
							</div>
							<form method="post" action="php/login.php">
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email Address" required="">
							</div>
							<div class="form-group">
								<input class="input" type="password" name="pass" placeholder="Password" required="">
							</div>
							
							<input type="submit" name="btn_login" value="Login" class="primary-btn">
							</form>
							<?php  
													if (isset($_GET['msg'])) 
													{
													echo "<div class='alert alert-danger'><strong>Invalid Login!</strong></div>";
													}
													elseif (isset($_GET['error'])) 
													{
													echo "<div class='alert alert-danger'><strong>Login Please!</strong></div>";
													}
													
														?>
						</div>
					</div>

					<div class="col-md-6">
						

						<div class="payments-methods">
							<div class="section-title">
								<h3 class="title">Create New Account</h3>
							</div>
							
							<form method="post" action="php/signup.php">
							<div class="form-group">
								<input class="input" type="text" name="first-name" pattern="[A-Za-z]{3,}" placeholder="Please Enter Your First Name" title="Must contain at least three alphabets, and no number is allowed" required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" pattern="[A-Za-z]{3,}" placeholder="Please Enter Your Last Name" required="" title="Must contain at least three alphabets, and no number is allowed">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Please Enter Your Email Address" required="" title="Must contain at @, and domain">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" pattern="[A-Za-z1-9./ ]{5,}" placeholder="Please Enter Your Address" required="">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" pattern="03[0-9]{2}-[0-9]{7}" title="Number Format should be Like: 0347-1244474" placeholder="Please Enter Your Contact Number" required="">
							</div>
							<div class="form-group">
								<select class="input" required="" name="cmb-area">
									<option value="0">Select Your Area</option>
									<?php			
											$area = $db->db_select("tbl_area");	
											while($rows = mysqli_fetch_array($area))
											{
												echo "<option value='$rows[1]'>$rows[1]</option>";
											}
										?>
								</select>

							</div>
							<div class="form-group">
								<input class="input" type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Please Enter 8 Digit Password " required="">
							</div>
							
							
							
							<input type="submit" name="btn_signup" value="Signup" class="primary-btn">
							</form>
							<?php 
							if (isset($_GET['failure'])) {
							echo "<div class='alert alert-danger'><strong>Email Already Exist Try Another Email</strong></div>";
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
include('footer.php');
 ?>
