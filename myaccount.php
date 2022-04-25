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
				<li class="active">My Account</li>
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
						

						<div class="payments-methods">
							<div class="section-title">
								<h3 class="title">Account Information</h3>
							</div>
							<form method="post" action="php/updateaccount.php">
							<?php 
							$user = $db->db_select1("select * from tbl_user where id = $_SESSION[user_id] ");
							foreach ($user as $p)
							{
								echo "<div class='form-group'>
								<input class='input' type='text' name='first-name' pattern='[A-Za-z]{3,}'  title='Must contain at least three alphabets, and no number is allowed' required='' value='$p[firstname]'>
							</div>
							<div class='form-group'>
								<input class='input' type='text' name='last-name' pattern='[A-Za-z]{3,}'  required='' title='Must contain at least three alphabets, and no number is allowed' value='$p[lastname]'>
							</div>
							<div class='form-group'>
								<input class='input' type='email' name='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'  required='' title='Must contain at @, and domain' value='$p[email]'>
							</div>
							<div class='form-group'>
								<input class='input' type='text' name='address' pattern='[A-Za-z1-9./ ]{5,}' required=''value='$p[address]'>
							</div>
							<div class='form-group'>
								<input class='input' type='tel' name='tel' pattern='03[0-9]{2}-[0-9]{7}' title='Number Format should be 0347-1244474' required='' value='$p[telephone]'>
							</div>
							<div class='form-group'>
								<select class='input' required='' name='cmb-area'>
								<option value='$p[area]'>$p[area]</option>
								";
							}
							 ?>
							
									<?php			
											$area = $db->db_select("tbl_area");	
											while($rows = mysqli_fetch_array($area))
											{
												echo "<option value='$rows[1]'>$rows[1]</option>
												";
											}
										?>
										</select></div>
								<input type='submit' name='btn_sub' value='Update Account' class='primary-btn'>
							</form>
							<?php 
							if (isset($_GET['msg'])) 
							{
							echo "<div class='alert alert-success'><strong>Account Updated Succesfully </strong></div>";
							}
							else if(isset($_GET['msgfailure']))
							{
								echo "<div class='alert alert-danger'><strong>Fail To Update Account</strong></div>";
							}
							 ?>
						</div>
					</div>

					<div class="col-md-6">
						

						<div class="payments-methods">
							<div class="section-title">
								<h3 class="title">Change Password</h3>
							</div>
							<form method="post" action="php/changepass.php">
							<div class='form-group'>
								<input class='input' type='password' name='oldpass' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' placeholder='Please Enter Your Old Password ' required=''>
							</div>
							<div class='form-group'>
								<input class='input' type='password' name='newpass' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' placeholder='Please Enter New Password ' required=''>
							</div>
								<input type='submit' name='btn_sub' value='Change Password' class='primary-btn'>
							</form>
							<?php 
							if (isset($_GET['msgsuccess'])) 
							{
							echo "<div class='alert alert-success'><strong>Password Succesfully Updated</strong></div>";
							}
							else if(isset($_GET['msgfail']))
							{
								echo "<div class='alert alert-danger'><strong>Password Is Incorrect</strong></div>";
							}
							 ?>
							
						</div>
					</div>

			</div>

			<!-- /row -->
					<div class="col-md-6">
							<div class="payments-methods">
							<div class="section-title">
								<h3 class="title">Add Card</h3>
							</div>
							<p>Add Card For Online Transaction For Your Order</p>
							<a href="addcard.php" class="primary-btn">Add Card</a>
						</div>
					</div>
		</div>

		<!-- /container -->
	</div>
	<!-- /section -->
<?php 
include('footer.php');
 ?>
