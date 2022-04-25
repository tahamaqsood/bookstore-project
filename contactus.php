<?php
include('header.php');
 ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Contact Us</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		
		<!-- container -->
		<div class="container">
			<div class="col-md-12">

			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3620.0293192686904!2d67.0741949!3d24.8628482!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33ea3db108f41%3A0x42acc4507358b160!2sAptech%20Computer%20Education%2C%20Shahrah%20e%20Faisal%20Center!5e0!3m2!1sen!2s!4v1569753324557!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
			<!-- row -->
			<div class="row">
				
					<div class="col-md-6">
						<div class="billing-details">
							
							<div class="section-title">
								<h3 class="title">Contact Us</h3>
							</div>
							<form method="post" action="php/contact.php">
							<div class="form-group">
<input class="input" type="text" name="first-name" pattern="[A-Za-z ]{3,}" placeholder="Please Enter Your First Name" title="Must contain at least three alphabets, and no number is allowed" required="">							
</div>
							<div class="form-group">
<input class="input" type="text" name="last-name" pattern="[A-Za-z ]{3,}" placeholder="Please Enter Your Last Name" required="" title="Must contain at least three alphabets, and no number is allowed">							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Please Enter Your Email Address" required="" title="Must contain at @, and domain">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="subject" pattern="[A-Za-z1-9 ]{5,30}" title="Subject Should Be In Between 5 to 30 Alphabets" placeholder="Please Enter Your Subject" required="">
							</div>
							
							<div class="form-group">
								<textarea class="input" name="msg" placeholder="Your Message" style="height: 100px"></textarea>
							</div>
							<input type="submit" name="btn_sub" value="Send Message" class="primary-btn">
							</form>
							
						</div>
						<?php 
							if(isset($_GET['msg']))
							{
													
							echo "<div class='alert alert-success'><strong>Message Sent</strong></div>";
																											
							}
							 ?>
					</div>

					<div class="col-md-6">
						

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Contact Details</h4>
							</div>
							<div class="input-checkbox">
								
								<label for="payments-1">Address</label>
								<p>Aptech Shahre Faisal, Progressive Centre 3rd Floor karachi</p>
								
							</div>
							<div class="input-checkbox">
								
								<label for="payments-1">Support</label>
								<p>0347-1244474 , 0308-2666447</p>
								
							</div>
							<div class="input-checkbox">
								
								<label for="payments-1">Email</label>
								<a href="mailto:shahardabookstore@gmail.com?Subject=Hello%20Admin"><p>shahardabookstore@gmail.com</p></a>
								
							</div>
						</div>
					</div>
					<div class="col-md-6">
						

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Opening Hours</h4>
							</div>
							<div class="input-checkbox">
								
								<label for="payments-1">Monday To Friday</label>
								<p>9am To 9pm</p>
								<label for="payments-1">Saturday To Sunday</label>
								<p>9am To 11pm</p>
								
							</div>

							
							
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
