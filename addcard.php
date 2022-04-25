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
				<li class="active">Add Card</li>
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
								<h4 class="title">Add Card</h4>
							</div>
							<form method="post" action="php/addcard.php">
						<div class="form-group">
							<input class="input" type="hidden" name="code" placeholder="Enter Card Number" required="" value="<?php echo  rand(100000,900000); ?>" style="width: 40%">
						</div>		
						<?php 
						$user = $db->db_select1("select * from tbl_user where id = $_SESSION[user_id] ");
						foreach ($user as $p)
						{
						 echo "
						<div class='form-group'>
							<input class='input' type='hidden' name='email' value='$p[email]' required='' style='width: 40%'>
						</div>";
						
						}
						 ?>
						<div class="form-group">
							<input class="input" type="text" name="cardno" placeholder="Enter Card Number" required="" pattern="[0-9]{4}[-][0-9]{4}[ -][0-9]{4}[-][0-9]{4}" title="Enter Your Card In The Given Format 4321-4321-4321-4321" style="width: 40%">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="name" placeholder="Cardholder Name" required="" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="No Special Characters Are Allowed" style="width: 40%">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="date" placeholder="Expiry Date (MM/YY)" required="" pattern="^\d{2}\/\d{2}$" title="Match The Format (MM/YY)" style="width: 40%">
						</div>
						<div class="form-group">
							<input class="input" type="password" name="key" placeholder="Security Key (CVV)" required="" pattern="[1-9]{3}" title="Enter 3 Digit Security Key" style="width: 40%">
						</div>
						<div class="form-group">
							<button type='submit' name='submit' class='primary-btn'>Validate Card</button>
						</div>

						
					</form>
					<?php 
					if (isset($_GET['failure'])) 
						{
							echo "<div class='alert alert-danger'><strong>Card Already Exist</strong></div>";
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
