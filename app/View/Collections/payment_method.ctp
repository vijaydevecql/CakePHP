<section class="account">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="acnt_text">
					<h2>Select a payment method  </h2>
				</div>
			</div>

		</div>
	</div>
</section>
<section class="cart_list">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="adrs_btns">
					<div class="btn1">
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="frm_payment_method" id="payment" method="post">
			              <!-- Identify your business so that you can collect the payments. -->
			             	 <input type="hidden" name="business" value="testlate9-facilitator@gmail.com">

			              <!-- Specify a Buy Now button. -->
			              	<input type="hidden" name="cmd" value="_xclick">


			              <!-- Specify details about the item that buyers will purchase. -->
			              	
							<input type="hidden" name="item_number" value="<?php echo $_user_data['id']; ?>">
							<input type="hidden" name="item_name" value="testing">
							<input type="hidden" name="amount"  id='amount' value="<?php echo number_format($amount,2); ?>">
							<input type="hidden" name="currency_code" value="USD">
							<!-- <input type="hidden" name="lc" value="" /> -->
							<input type="hidden" name="no_shipping" value="1" />
							<input type="hidden" name="custom" value="<?php echo $address_id; ?>">
							<input type="hidden" name="no_note" value="1" />
							<input type="hidden" name="charset" value="utf-8" />
							<input type="hidden" name="page_style" value="paypal" />
							<input type='hidden' name='cancel_return' value='<?php echo Router::url('/',true); ?>'>
							<input type='hidden' name='return' value='<?php echo Router::url('success',true); ?>'>
							<input type="hidden" name="notify_url" value="<?php echo Router::url('ipn',true); ?>" />
							<button id="place-order-button" type="submit" class="btn btn-default" type="button">PayPal</button>
						<!-- <button type="submit" class="btn btn-info btn-md pull-right col-md-2">Place Order</button> -->
					</form>
					</div>
					<div class="btn2">
						<a href="<?php echo $this->webroot.'payment/'.$address_id; ?>" class="btn btn-default">Credit | Debit</a>
					</div>
					<!-- <div class="btn3">
					
					<a href="<?php echo $this->webroot.'payment/'.$address_id?>" class="btn btn-default">Authorize Net </a>
					</div> -->
				</div>
					
			</div>
				
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('.card_id').click(function() {
		
		var card_id = $("input[name='card_id']:checked").val();

			alert(card_id);

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