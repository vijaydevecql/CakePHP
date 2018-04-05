<!-- <section class="account">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="acnt_text">
					<h2>Select a payment method  </h2>
				</div>
			</div>

		</div>
	</div>
</section> -->
<section class="filter_bn">
	<h3>Checkout</h3>
	<h2>Select a payment method</h2>
</section>

<section class="cart_list">
	<div class="container">
		<div class="row">
			<?php if(count($my_payment_options)){ ?>
			<div class="col-md-12 bdrd">
				<div class="cart_atable">
					<div class="table-responsive cart_table">   
						<p class="terms">By clicking on the 'Place Your Order and Pay' button, you agree to <a href="">privacy notice</a> and  <a href="">conditions of use.</a> </p>							
						<table class="table">
							<thead>
								<tr>
									<th>Your saved credits and debit cards</th>
									<th>Neme on card</th>
									<th>Expires on</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($my_payment_options as $key => $value) { ?>
									<tr class="tr_back">
										<td>
											<p class="visa_pay">
												<input type="radio" value="<?php echo $value['PaymentOption']['id']; ?>"
												 name = "card_id" class="card_id"/>
												<img  width="33" src="<?php echo $this->webroot.'files/default/'.$value['PaymentOption']['type'].'.png'; ?>" ><b><?php echo $value['PaymentOption']['type'];?></b> ending in 6014</p>
										</td>
										<td><p class=""><?php echo ucfirst($value['PaymentOption']['card_name']); ?></p></td>

										<td class="send_to"> 
											<p class=""><?php echo ucfirst($value['PaymentOption']['expire_month']); ?>/<?php echo $value['PaymentOption']['expire_year']; ?></p>				
										</td>

									</tr>
								<?php } ?>


								</tbody>
							</table>
							<h4>Another payment methed</h4>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="col-md-6">

					<?php echo $this->Form->create('payment');?>
					<div class="form-group">
						<label>Credit Card/Debit card Number: </label>
						<input class="form-control" name="data[Payment][card_number]" type="text" id="card_number">
					</div>
					<div class="form-group">
						<label>Expire Month: </label>
						<select name="data[Payment][expiry_month]" required class="form-control payment_input date" id="expiry_month">
							<option value="">Choose Expire Month</option>
							<?php
							for ($i = 1; $i <= 12; $i++) {
								if ($i <= 9) {
									$i = sprintf("%02d", $i);
								}
								?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?> 
							</select>
						</div>
						<div class="form-group">
							<label>Expire Year: </label>
							<select name="data[Payment][expiry_year]" required class="form-control payment_input date" id="expiry_year">
								<option value="">Choose Expire Year</option>
								<?php for ($i = date('Y'); $i <= date('Y') + 20; $i++) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?> 
							</select>
						</div>
						<div class="form-group">
							<label>Cvv: </label>
							<input class="form-control" name="data[Payment][cvv]" type="text" required id="cvv">
						</div>
						<input type="hidden" name="data[Payment][address_id]" value="<?php echo $address_id; ?>">
						<button type="submit" class="btn btn-default submit">Pay</button>
						<?php echo $this->Form->end(); ?>
			<!-- <ul class="pay_list">
						<li>
							<p class="visa_pay"><input type="radio" /> Credit Card</p>
							<img src="images/cards.png">
						</li>
						<li>
							<p class="visa_pay"><input type="radio" /> Debit Card</p>
							<div class="styled-select blue semi-square">
							  <select>
								<option>Choose a Bank</option>
								<option>The second option</option>
								<option>The third option</option>
							  </select>
							</div>
						</li>
						<li>
							<p class="visa_pay"><input type="radio" /> Net Banking</p>
							<div class="styled-select blue semi-square">
							  <select>
								<option>Choose a Bank</option>
								<option>The second option</option>
								<option>The third option</option>
							  </select>
							</div>
						</li>
					</ul> -->
				</div>
			<!-- <div class="col-md-6 col-md-offset-6">
				<div class="sub_total">
					<a href="" > Continue</a>
				</div>
			</div> -->
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('.card_id').click(function() {
		
		var card_id = $("input[name='card_id']:checked").val();

			//alert(card_id);

			if(card_id > 0){
			 		
			 		//alert(card_id);
		            $.ajax({
		                url: "<?php echo $this->webroot . 'users/select_payment/' ?>" + card_id,
		                cache: false
		            }).done(function (html) {
		            	obj = JSON.parse(html);
						$.each(obj, function(index, value) {
								console.log(value);
								$("#card_number").val(value.card_number);
								$("#expiry_month").val(value.expire_month);
							 	$("#expiry_year").val(value.expire_year);
						});
		            });

        		
			 }
		});	
	});
	$('#card_number').mask('9999-9999-9999-9999');
	$('#cvv').mask('999');

</script>