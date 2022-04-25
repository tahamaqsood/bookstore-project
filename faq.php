<?php 
include('header.php');
 ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Faq</li>
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
								<h4 class="title">FAQ</h4>
							</div>

<?php 
$query = $db->db_select1("select * from tbl_faq where status='Active'");
$count=0;
foreach ($query as $q)  
{
	echo "<div class='input-checkbox'>
								
		<label for='payments-1'>* $q[title]</label>
		<p>$q[description]</p>
								
		</div>
						";
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
