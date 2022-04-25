<?php 
include("header.php");

 ?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Feedback</li>
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
						<div class="shiping-methods">
							<div class="section-title">
								<h3 class="title">Feedback</h3>
								<h4>Please provide your feedback below<h4>
							</div>
							<div class="input-checkbox">
								
								<label for="shipping-1">How do you rate your overall experience?</label>
								
							</div>
							<div class="input-checkbox">
								<form method="post" action="php/feedback.php">
								<input type="radio" name="rate" id="shipping-2" value="Best" required="" >
								<label for="shipping-2">Best</label>
								<input type="radio" name="rate" id="shipping-2" value="Good" style="margin-left: 10px;" required="">
								<label for="shipping-2">Good</label>
								<input type="radio" name="rate" id="shipping-2" value="Bad" style="margin-left: 10px;" required="">
								<label for="shipping-2">Bad</label>

								<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Full Name" required=""title="Must contain at least three alphabets, and no number is allowed" pattern="[A-Za-z ]{3,}">
								</div>

								<div class="form-group">
								<input class="input" type="email" name="em" placeholder="Email" required=""pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"title="Must contain at @, and domain">
								</div>
								<div class="form-group">
								<textarea class="input" name="msg" placeholder="Your Message" style="height: 100px"></textarea>
							</div>
							<input type="submit" name="btn_sub" value="Send Message" class="primary-btn">
								</form>
								<?php 
							if(isset($_GET['msg']))
							{
													
							echo "<div class='alert alert-success'><strong>Message Sent</strong></div>";
																											
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
include("footer.php");
 ?>
 