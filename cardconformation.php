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
							<form method="post" action="php/confirmcode.php">
										
						<div class="form-group">
						<input class="input" type="text" name="concode" placeholder="Enter Confirmation Code" required="" pattern="[1-9]{6}" title="Please Enter 6 Digit Code" style="width: 40%">

						</div>
						<label><i>Note: Paste The Comfirmation Code That Has Been Sent To Your Registered Email.</i></label>

						<div class="form-group">
						<button type='submit' name='submit' class='primary-btn'>Add Card</button>
						</div>
						<?php 
						if (isset($_GET['msg'])) 
						{
							echo "<div class='alert alert-danger'><strong>Invalid Code</strong></div>";
						}
						elseif(isset($_GET['message']))
						{
							echo "<div class='alert alert-success'><strong>Card Successfully Added</strong></div>";
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
