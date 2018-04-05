	<section class="account">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="acnt_text">
							<h2>Shopping Cart  </h2>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<section class="cart_list">
			<div class="container">
				<div class="row">
					<div class="col-md-12 bdrd">
						<div class="cart_atable">
							<div class="table-responsive cart_table">          
							  <table class="table">
								<thead>
								  <tr>
									<th>Items</th>
									<th>Items Details</th>
									<th>Price </th>
									<th class="centerth">Quantity</th>
									<th></th>
								  </tr>
								</thead>
								<tbody>
								<?php 
									if(count($record)){
										$sub_total = 0.00;
										foreach ($record as $key => $value) { ?>
										<tr>
											<td><?php echo ucfirst($value['product_tite']); ?></td>
												<td>
												$ <?php echo $value['product_price']; ?>
												<?php  $sub_total = $sub_total + $value['product_price']; ?>
												</td>
												<td class="quty">
														<div class="input-group">
														<span class="input-group-btn">
															<button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
															  <span class="glyphicon glyphicon-minus"></span>
															</button>
														</span>
														<input type="text" id="quantity" name="quantity" class="form-control input-number" value="<?php echo $value['product_quantity']; ?>" min="1" max="100">
														<span class="input-group-btn">
															<button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
																<span class="glyphicon glyphicon-plus"></span>
															</button>
														</span>
														</div>
												</td>
												<td class="cncl"><img src="<?php echo $this->webroot.'files/default/cross.png'; ?>" ></td>
								  		</tr>	
										<?php }
										
									}
								?>
								</tbody>
							  </table>
							</div>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="use_cpn">
							<p>Use Coupon <input type="text"></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="sub_total">
							<h2>Subtotal (<?php echo count($record); ?> items) : <span>$<?php echo number_format($sub_total,2); ?> </span> </h2>
							<a href="" > Proceed to Checkout</a>
						</div>
					</div>
				</div>
			</div>
</section>
		