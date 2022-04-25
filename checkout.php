<?php 
include("header.php");

?>
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Checkout</li>
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
			<form id="checkout-form" method="POST" action="php/checkoutcode.php" class="clearfix">
				<div class="col-md-6">
					<div class="billing-details">
						<p>Already a customer ? <a href="Accounts.php">Login</a></p>
						<div class="section-title">
							<h3 class="title">Billing Details</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="first-name" placeholder="First Name" required="" pattern="[A-Za-z ]{3,}" title="Must contain at least three alphabets, and no number is allowed">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="last-name" placeholder="Last Name" required="" pattern="[A-Za-z ]{3,}" title="Must contain at least three alphabets, and no number is allowed">
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must contain at @, and domain">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address" required="" pattern="[A-Za-z1-9, /]{5,30}">
						</div>
						<div class="form-group">
							<select class="input" required="" name="cmb-area" required="">
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
							<input class="input" type="tel" name="tel" placeholder="Telephone" required="" pattern="03[0-9]{2}-[0-9]{7}" title="Number Format should be Like: 0347-1244474">
						</div>
						<div class='form-group'>
							<input type="hidden" name="date" value="<?php echo date("jS M Y / h:i"); ?>">
						</div>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="shiping-methods">
						<div class="section-title">
							<h4 class="title">Shiping Methods</h4>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="shipping" id="shipping-1" checked>
							<label for="shipping-1">Free Shiping -  $0.00</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
									</div>
								</div>
								<div class="input-checkbox">
									<input type="radio" name="shipping" id="shipping-2">
									<label for="shipping-2">Standard - $4.00</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											<p>
											</div>
										</div>
									</div>

									<div class="payments-methods">
										<div class="section-title">
											<h4 class="title">Payments Methods</h4>
										</div>
										<div class="input-checkbox">
											<input type="radio" name="payments" id="payments-1" checked value="Before Deliervery">
											<label for="payments-1">Before Deliervery</label>
											<div class="caption">
												<p>Where the customer need to send a Demand Draft of the total bill so as to receive the order.
													<p>
													</div>
												</div>
												<div class="input-checkbox">
													<input type="radio" name="payments" id="payments-2" value="Cash On Delivery">
													<label for="payments-2">Cash On Delivery</label>
													<div class="caption">
														<p>Payment to be done at the time of receipt of the product. It can be done in two ways, either payment through cash or payment through cheque. 
															<p>
															</div>
														</div>
														<div class="input-checkbox">

															<input type="radio" name="payments" id="payments-3" value="Online Payment">
															<label for="payments-3">Online Payment Through Bank Account</label>
															
															<div class="caption">
																
							<p>Payment will be through the bank accounts. Add your Card in your Accounts Settings or click here to add.</p>
							<a href='addcard.php' class='primary-btn'>Add Card</a>
							</div>
															
																</div>
															</div>
														</div>

														<div class="col-md-12">
															<div class="order-summary clearfix">
																<div class="section-title">
																	<h3 class="title">Order Review</h3>
																</div>
																<table class="shopping-cart-table table">
																	<thead>
																		<tr>
																			<th>Product</th>
																			<th></th>
																			<th class="text-center">Price</th>
																			<th class="text-center">Quantity</th>
																			<th class="text-center">Total</th>
																			<th class="text-right"></th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		if(!empty($_SESSION["scart"]))
																		{
																			$total = 0;

																			foreach($_SESSION["scart"] as $keys => $values){

																		?>
																		<tr>
																		<?php 
																			$img = $db->getimg1($values['id']);
																				foreach ($img as $i) 
																				{
																					echo "<td class='thumb'><img src='admin/images/$i[name]' alt=''></td>";
																				}
																		?>

																			<td class="details">
																			<?php  
																				echo "<a href='singleproduct.php?pid=$values[id]'>$values[name]</a>";
																			?>
																			</td>
																			<td class="price text-center">
																				<strong>Rs <?php echo $values["price"]; ?></strong>
																			</td>
																			<td class="qty text-center">
																				<input class="input" name="qty[]" type="number" min="1" max="<?php
																					$pro = $db->getsignlepro($values['id']);
																					foreach ($pro as $p)  echo $p["quantity"] ?>" value="<?php echo $values["qty"]; 
																				?>">
																			</td>
																			<td class="total text-center">
																				<strong class="primary-color">Rs <?php echo number_format($values["qty"] * $values["price"], 2); ?>
																					
																				</strong>
																			</td>
																			<td class="text-right">
																				<a href="php/delete.php?action=delete&id=<?php echo $values["id"]; ?>" class="main-btn icon-btn"><i class="fa fa-close"></i>
																				</a>
																			</td>
																		</tr>

																		<input type="hidden" name="productid[]" value="<?php echo $values['id'].'.'.$values['qty']; ?>">

																		
																			<?php
																				$total = $total + ($values["qty"] * $values["price"]);
																			}
																			?>
																		</tbody>
																		<tfoot>
																			<tr>
																				<th class="empty" colspan="3"></th>
																				<th>SHIPING</th>
																				<td colspan="2">Free Shipping</td>
																			</tr>
																			<tr>
																				<th class="empty" colspan="3"></th>
																				<th>TOTAL</th>
																				<th colspan="2" class="total"><?php  echo number_format($total, 2); 

																			}
																				else
																				{
																					echo "<h3>No Products In Cart</h3>";
																				}?>

																			</th>
																		</tr>
																	</tfoot>
																</table>
																<div class="pull-right">
																	<div class='form-group'>
																		<input type="hidden" name="total" value=" <?php echo $total ?>">
																	</div>
																	<div class='form-group'>
																		<input type="hidden" name="ordernum" value="<?php echo "ORDER#". rand(10,10000); ?>">
																	</div>
																	<?php 
																	if (!isset($_SESSION['user_id']))
																	{
																		echo "<a class='primary-btn' href='Accounts.php?error=Loginplease'>Place Order</a>";
																		
																	}
																	elseif (!isset($_SESSION['scart'])) 
																	{
																		echo "";
																	}
																	else
																	{
																		echo "<button type='submit' name='submit' class='primary-btn'>Place Order</button>";
																	}
																	 ?>
																	
																	
																</div>
															</div>

														</div>
													</form>
												</div>
												<!-- /row -->
											</div>
											<!-- /container -->
										</div>
										<!-- /section -->

										<?php 
										include("footer.php");
										?>
