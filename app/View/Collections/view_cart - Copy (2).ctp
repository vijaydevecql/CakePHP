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
					<div class="table_ele">
						<table>
						  <thead class="border_thd">
							<tr>
							  <th scope="col">Account</th>
							  <th scope="col">Due Date</th>
							  <th scope="col">Amount</th>
							  <th scope="col">Period</th>
							</tr>
						  </thead>
						  <tbody>
							<tr>
							  <td data-label="Account">Visa - 3412</td>
							  <td data-label="Due Date">04/01/2016</td>
							  <td data-label="Amount">$1,190</td>
							  <td data-label="Period">03/01/2016 - 03/31/2016</td>
							</tr>
							<tr>
							  <td scope="row" data-label="Account">Visa - 6076</td>
							  <td data-label="Due Date">03/01/2016</td>
							  <td data-label="Amount">$2,443</td>
							  <td data-label="Period">02/01/2016 - 02/29/2016</td>
							</tr>
							<tr>
							  <td scope="row" data-label="Account">Corporate AMEX</td>
							  <td data-label="Due Date">03/01/2016</td>
							  <td data-label="Amount">$1,181</td>
							  <td data-label="Period">02/01/2016 - 02/29/2016</td>
							</tr>
							<tr>
							  <td scope="row" data-label="Acount">Visa - 3412</td>
							  <td data-label="Due Date">02/01/2016</td>
							  <td data-label="Amount">$842</td>
							  <td data-label="Period">01/01/2016 - 01/31/2016</td>
							</tr>
						  </tbody>
						</table>
					</div>
					
					
					
					
						<div class="cart_atable">
							<div class="table-responsive cart_table">
							  <table class="table">
								<thead>
								  <tr>
									<th scope="col">Items</th>
									<th scope="col">Items Details</th>
									<th scope="col">Price </th>
									<th scope="col" class="centerth">Quantity</th>
									<th></th>
								  </tr>
								</thead>
								<?php if(count($record)){ ?>
								<tbody>
								<?php
									//prx($record);
										$sub_total = 0.00;
										foreach ($record as $key => $value) { ?>
										<tr id="cart_row_<?php echo $value['id']; ?>">
											<td ><?php echo ucfirst($value['product_tite']); ?></td>
											<td><?php echo ucfirst($value['product_description']); ?></td>
											<td id="price_<?php echo $value['id']; ?>">
											$ <?php echo $value['product_price']; ?>
											</td>
											<?php  $sub_total = $sub_total + $value['product_price']; ?>
											<td class="quty" id="quantity_<?php echo $value['id']; ?>">
														<div class="input-group">
														<span class="input-group-btn">
															<button type="button" class="quantity quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="minus" data-id="<?php echo $value['id']; ?>">
															  <span class="glyphicon glyphicon-minus"></span>
															</button>
														</span>


														<input type="text" id="q_<?php echo $value['id']; ?>" name="quantity" class="form-control input-number" value="<?php echo $value['product_quantity']; ?>" min="1" max="100" value="<?php echo $value['product_quantity']; ?>">
														<input type="hidden" data-price = "<?php echo $value['single_product_price']; ?>"
													id="single_product_price_<?php echo $value['id']; ?>">

													<input type="hidden" data-price = "<?php echo $value['product_price']; ?>"
													id="total_product_price_<?php echo $value['id']; ?>">
														<span class="input-group-btn">
															<button type="button" class="quantity quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="plus" data-id="<?php echo $value['id']; ?>">
																<span class="glyphicon glyphicon-plus"></span>
															</button>
														</span>
														</div>
												</td>
												<td class="cncl">
													<a href="javascript:void(0);">
														<img src="<?php echo $this->webroot.'files/default/cross.png'; ?>" class="cross" data-id = "<?php echo $value['id']; ?>">
													</a>
												</td>
								  		</tr>
										<?php }
									}else{ ?>
										<tr> <td colspan="4">Cart is empty </td></tr>
									<?php }
								?>
								</tbody>
							  </table>
							</div>

						</div>
					</div>
					<?php if(count($record)){ ?>
					
					<?php
					/**  promo code calculation**/
					$diff = $sub_total;
					$pro = "";
					$p_amount = 0;
					$_pro = 0;
					$is_use = 0;
					$type = 0 ;
					//$this->Session->delete('Promo');

					$is_promo_exists = $promo_use;
					//prx($is_promo_exists);

					//prx($is_promo_exists);
				$promo_date = date('Ymd',$is_promo_exists['end_date']);
				$today = date('Ymd');
				if($promo_date >= $today)
				{
					$is_use = 1;
					$type = $is_promo_exists['type'];
					$_pro_name = $is_promo_exists['name'];
					if($is_promo_exists['type'] == 2)
					{
						$pro = $is_promo_exists['value']."%";
						$_pro = $is_promo_exists['value'];
						
						$p_amount = ($sub_total * $is_promo_exists['value'])/100;
						$diff = $sub_total - $p_amount;
					}elseif($is_promo_exists['type'] == 1)
					{
						$p_amount = $is_promo_exists['value'];
						$_pro = $is_promo_exists['value'];
						$pro = "$".$is_promo_exists['value'];
						$diff = ($sub_total - $is_promo_exists['value']);
					}
				}

				//echo $pro;
				?>

					
					<div class="col-md-6">
						<?php 
							if(!$is_use){

						?>
						<div class="use_cpn">
							 <p>Use Coupon <input type="text" id="promo_code"></p>
							 <button class="btn btn-default yellow_btn" id="promo_btn" >Apply Promo Code</button>
						</div>
						<?php } ?>
					</div>
					
					<div class="col-md-4 col-md-offset-2">
						<div class="sub_total" style="display:none;">
						<!-- 	<h2>Subtotal (<span id="subtotal_text_span" class="items_text"><?php echo count($record); ?> items</span>) :
							<span id="dis_total">$<?php echo number_format($sub_total,2); ?> </span>
							<h2 id="p_a">Promo applied (<?php echo $pro; ?> ) :
							<div class="right_ta"><span id="dis_promo_total">$<?php echo number_format($p_amount,2); ?> </span></div>
							<h2>Total (<span id="total_text_span" class="items_text"><?php echo count($record); ?> items </span>) :
							<span id="dis_sub_total">$<?php echo number_format($diff,2); ?> </span> -->
							<input type="hidden" data-price = "<?php echo $diff; ?>" id="subtotal">
							<input type="hidden" data-promoa = "<?php echo $_pro; ?>" id="promoa">
							<input type="hidden" data-total = "<?php echo $sub_total; ?>" id="total">
							<input type="hidden" data-use = "<?php echo $is_use; ?>" id="p_use">
							<input type="hidden" data-ptype = "<?php echo $type; ?>" id="p_type">
							</h2>
						</div>
						<div class="new_cart"> <h3> Subtotal : </h3> <h4> <span id="dis_total">$<?php echo number_format($sub_total,2); ?> </span></h4></div>
						<!-- <div class="new_cart"> <h3> Taxes & Fees : </h3> <h4> $0.00</h4></div> -->
						<div class="new_cart"> <h3> Promo Code : <?php echo @$_pro_name; ?> <span id="p_a" ></span> </h3> <h4> <span id="dis_promo_total">$<?php echo number_format($p_amount,2); ?> </span> <span class="items_text" id="rm_promo"><?php if($is_use){ ?><a href="<?php echo $this->webroot.'remove_coupon';?>"><i class="fa fa-trash green"></i></a><?php }?> </span> </h4></div>
						<div class="new_cart ttoal"> <h3> Total: </h3> <h4> <span id="dis_sub_total">$<?php echo number_format($diff,2); ?> </span></h4></div>
						<a style="float: right;" class="yellow_btn" href="<?php echo $this->webroot.'address'?>" > Continue </a>
					</div>
					<?php } ?>
				</div>
			</div>
</section>
<script type="text/javascript">


$('body').on('click', '.cross', function (e) {

				//var user_id  = '<?php echo !empty($_user_data['id'])?$_user_data['id']:0; ?>';
				//alert(user_id);
				e.preventDefault();

				
				//return false;
					_this = $(this);
					P_id = _this.attr('data-id');
					_this.addClass('disabled');
					var Subtotal = $("#subtotal").attr('data-price'); // this is a total price

					var total = $("#total").attr('data-total'); // this is a sub-total price
					total = parseInt(total);
					//alert(total);
					var p_price = $("#total_product_price_"+P_id).attr('data-price');
					//alert(p_price);
					//return false;
					$.ajax({
					url: "<?php echo $this->webroot . 'collections/remove_product/' ?>" + P_id,
					cache: false
					}).done(function (html) {
					if (html === '0') {
						$("#cart_row_"+P_id).remove();
						var cart_num = $(".beges").html();
						if(cart_num != 0){
							card_num = parseInt(cart_num)-1;
						}else{
							card_num = 0;
						}
						$('.beges').html(card_num);

						Subtotal = parseInt(Subtotal) -  parseInt(p_price);
						//alert(Subtotal);
						Subtotal = Subtotal.toFixed(2);

						total = parseInt(total) -  parseInt(p_price);
						//alert(Subtotal);
						total = total.toFixed(2);
						$("#subtotal").attr('data-price',Subtotal);
						$("#dis_sub_total").html('$'+Subtotal);

						$("#total").attr('data-total',total);
						$("#dis_total").html('$'+total);
						
						//$("#dis_sub_total").html('$'+Subtotal);
						
						//$(".items_text").text( card_num + ' items');

						swal("",'Product has been remove from cart', "success");
						//alert();
					}
					if (html === '1') {
						swal("", "Try Again Later", "error");
					}
					_this.removeClass('disabled');
					});



        	});
$(document.body).on('click', '#promo_btn', function (e) {

	var promo = $("#promo_code").val();

	var a_val = $("#subtotal").data('price');
	// alert(a_val);

	if(promo != '')
	{

		$.ajax({
			url: "<?php echo $this->webroot . 'collections/apply_promo/' ?>",
			data:{'amount':a_val,'promo':promo},
			cache: false
			}).done(function (html) {
				//alert(html);
				var _data = jQuery.parseJSON(html);
				console.log(_data);

				if(_data.type == 3)
				{
					swal("",_data.msg, "success");
					$("#subtotal").val(_data.amount);
					$("#subtotal").attr('data-price',_data.amount);
					sub = 	_data.amount.toFixed(2);
					$("#dis_sub_total").text('$'+sub);
					//
					console.log(_data);
				// alert(_data.p_a);
					// $("#dis_promo_total").text("$"+_data.p_a);
					$("#p_a").text( promo );
					$("#dis_promo_total").text(_data.p_a);

					$("#p_use").attr('data-use',1);
					$("#p_type").attr('data-ptype',_data.pro_type);
					$("#promoa").attr('data-promoa',_data.promo_d);
					// attr('data-price',_subtotal);
					$('.use_cpn').css('display' , 'none');

					$('#rm_promo').html('<a href="<?php echo $this->webroot?>remove_coupon"><i class="fa fa-trash green"></i></a>');
				}else {
				swal("",_data.msg, "error");
				}
			if (html === '1') {
				swal("", "Try Again Later", "error");
			}
			// _this.removeClass('disabled');
		});
	}else{
		swal("", "Please enter promo code", "error");
	}
});



$(document.body).on('click', '.quantity', function (e) {

	_this = $(this);
	c_id = _this.attr('data-id');
	type = _this.attr('data-type');
	use = $("#p_use").attr('data-use');
	p_type = $("#p_type").attr('data-ptype');
	pa = $("#promoa").attr('data-promoa');

	if(type == 'minus' && $("#q_"+c_id).val() <= 1 ){

		swal("", "Quantity should be 1 or greater", "error");

	}else{

		_this.addClass('disabled');

		var price = $("#single_product_price_"+c_id).attr('data-price');

		var t_price = $("#total_product_price_"+c_id).attr('data-price');

		var Subtotal = $("#subtotal").attr('data-price');


		var p = '';

		$.ajax({
		url: "<?php echo $this->webroot . 'collections/update_quantity/' ?>" + c_id +'/'+type ,
		cache: false
		}).done(function (html) {
		if (parseInt(html) > 0) {

			//$("#quantity_"+c_id).val(html);
			 total = $("#total").attr('data-total');
			//  total = $("#total").data('total');
			total = parseInt(total);


			if(type.trim() == 'plus')
			{
				p = parseInt(t_price) +  parseInt(price);

				Subtotal = parseInt(Subtotal) +  parseInt(price);
				total +=  parseInt(price);


			}else if(type.trim() == 'minus')
			{
				p = parseInt(t_price) -  parseInt(price);
				Subtotal = parseInt(Subtotal) -  parseInt(price);
				total -=  parseInt(price);
			}
			// alert(total);
			_subtotal =  Subtotal;

			Subtotal = Subtotal.toFixed(2);

			//console.log($("#price_"+c_id).html());
			$("#price_"+c_id).html('$'+p);
			$("#total_product_price_"+c_id).attr('data-price',p);
			 $("#total").attr('data-total',total);
			$("#subtotal").attr('data-price',_subtotal);
			$("#dis_sub_total").html('$'+Subtotal);
			$("#dis_total").html('$'+Subtotal);
			/** if promo is used  **/

				 var	qu = 0;
				 	/** GET TOATL QTY **/


				qu =  parseInt(qu)
				$('.input-number').each( function( index, value )
				{
	   			qu += parseInt($(this).val());
				});

				if(qu !=0)
				{
					qu += 1;
				}

			var ra = 0;
			var p_t = "";
			if(use == 1)
			{
				if(p_type ==  2)
				{
					 ra = (total * pa)/100;
					 amount =  total - ra;
				}
				else if (p_type ==  1)
				{
					ra  = (total - pa);
					amount = ra;
					// qu = qu*pa;
				}
				_subtotal = '';
				_subtotal = p - ra;
				//  alert(_subtotal);
				ra = ra.toFixed(2);
				total = total.toFixed(2);
			$("#subtotal").attr('data-price',amount);
			$("#dis_total").html('$'+total);
			sub = amount.toFixed(2);
			$("#dis_sub_total").html('$'+sub);
			$("#dis_promo_total").html('$'+ra);
			}

			// $p_amount = ($sub_total * $is_promo_exists['value'])/100;
			// $diff = $sub_total - $p_amount;
			// alert(html);

			$("#q_"+c_id).val(html);
			$("#q_"+c_id).val(html);
						// alert(_subtotal);
		}else {

			swal("", "Try Again Later", "error");

		}

		_this.removeClass('disabled');
		});

	}

});
</script>
