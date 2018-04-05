<section class="account">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="acnt_text">
						<h2>Your Orders   </h2>
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

							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified">
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Open Orders</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Orders</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Cancelled order</a>
								</li>
							</ul>
							<!-- Tab panels -->
							<div class="tab-content card">
								<!--Panel 2-->
									<div class="tab-pane fade" id="panel2" role="tabpanel">
										<?php
									//prx($deliverd_order);
									if(count($open_order)){
										foreach ($open_order as $key => $value) { ?>
										<div class="ordr_details">
											<div class="col-md-2">
												<p>Order placed  <br><?php echo date('d M, Y',@$value['Order']['created']); ?></p>
											</div>0
											<div class="col-md-2">
												<p>Total  <br>$<?php echo number_format(@$value['Order']['amount_paid'],2); ?></p>
											</div>
											<div class="col-md-2">
												<p>Ship to  <br><?php echo strlen(trim(@$value['Address']['fullname']))?ucfirst(@$value['Address']['fullname']):'';  ?></p>
											</div>
											<div class="col-md-3 col-md-offset-3" style="text-align:right">
												<p>order #<?php echo @$value['Order']['ordernumber']?></p>
												<!-- <p class="blue_text"> Order Details <img src="<?php echo $this->webroot; ?>files/default/cart.png" /></p> -->
											</div>
										</div>
										<table class="table">

											<tbody>
												<?php 
												//prx($title);
												if(count($value['OrderItem'])){ 
													foreach ($value['OrderItem'] as $key1 => $value1) { ?>
													<tr>
														<td>
															<?php if(count($Media) && !empty($Media[$value1['product_id']]) ){ ?>
																<img  width="100px" src="<?php echo $this->webroot.'files/item_other_photo/'.$Media[$value1['product_id']]; ?>" />
															<?php }else{ ?>
 																<img width="100px" src="<?php echo $this->webroot.'files/item_other_photo/default.png'; ?>" />
															<?php } ?>
															
														</td>
														<td><p class="cart_edit_p"><?php echo (count(@$title)>0) ?ucfirst(@$title[$value1['product_id']]):'';?> <br> <span> $<?php echo (count(@$Price)>0)?@$Price[$value1['product_id']]:0; ?></span></p></td>

														<td><?php echo @$value1['quantity']; ?></td>
													</tr>

													<?php 	}  } ?>
											</tbody>
											</table>

											<?php }
										}else{
											echo "No Orders";
										}
										?>
										
									</div>
									<!--/.Panel 2-->
								<!--Panel 1-->
								<div class="tab-pane fade in active" id="panel1" role="tabpanel">
									<?php
									// /prx($deliverd_order);
									if(count($deliverd_order)){
										foreach ($deliverd_order as $key => $value) { ?>
										<div class="ordr_details">
											<div class="col-md-2">
												<p>Order placed  <br><?php echo date('d M, Y',$value['Order']['created']); ?></p>
											</div>0
											<div class="col-md-2">
												<p>Total  <br>$<?php echo number_format($value['Order']['amount_paid'],2); ?></p>
											</div>
											<div class="col-md-2">
												<p>Ship to  <br><?php echo strlen(trim($value['Address']['fullname']))?ucfirst($value['Address']['fullname']):'';  ?></p>
											</div>
											<div class="col-md-3 col-md-offset-3" style="text-align:right">
												<p>order #<?php echo $value['Order']['ordernumber']?></p>
												<!-- <p class="blue_text"> Order Details <img src="<?php echo $this->webroot; ?>files/default/cart.png" /></p> -->
											</div>
										</div>
										<?php 

											if(!empty($value['Order']['delivered_date'])){
												$weekday = date('N', $value['Order']['delivered_date']);
												
												$days = [0 => 'Sunday' , 1 => 'Monday', 2 => 'Tuseday' , 3 => 'Wednesday' , 4=> 'Thursday', 5 => 'Friday', 6 => 'Saturday' ];
											?>
												<h4>Delivered <?php echo $days[$weekday]; ?> </h4>
												<p>Your package was delivered </p>
										<?php } ?>
										
										<table class="table">

											<tbody>
												<?php 
												//prx($title);
												if(count($value['OrderItem'])){ 
													foreach ($value['OrderItem'] as $key1 => $value1) { ?>
													<tr>
														<td>
															<?php if(count($Media)){ ?>
																<img width="100px" src="<?php echo $this->webroot.'files/item_other_photo/'.$Media[$value1['product_id']]; ?>" />
															<?php }else{ ?>
 																<img width="100px" src="<?php echo $this->webroot.'files/item_other_photo/default.png'; ?>" />
															<?php } ?>
															
														</td>
														<td><p class="cart_edit_p"><?php echo (count($title)>0) ?ucfirst($title[$value1['product_id']]):'';?> <br> <span> $<?php echo (count($Price)>0)?$Price[$value1['product_id']]:0; ?></span></p></td>

														<td><?php echo $value1['quantity']; ?></td>
													</tr>

													<?php 	}  } ?>
											</tbody>
											</table>

											<?php }
										}else{
											echo "No Orders";
										}
										?>
									</div>
									<!--/.Panel 1-->
									
									<!--Panel 3-->
									<div class="tab-pane fade" id="panel3" role="tabpanel">
										<?php
									// /prx($deliverd_order);
									if(count($canceled_order)){
										foreach ($canceled_order as $key => $value) { ?>
										<div class="ordr_details">
											<div class="col-md-2">
												<p>Order placed  <br><?php echo date('d M, Y',$value['Order']['created']); ?></p>
											</div>0
											<div class="col-md-2">
												<p>Total  <br>$<?php echo number_format($value['Order']['amount_paid'],2); ?></p>
											</div>
											<div class="col-md-2">
												<p>Ship to  <br><?php echo strlen(trim($value['Address']['fullname']))?ucfirst($value['Address']['fullname']):'';  ?></p>
											</div>
											<div class="col-md-3 col-md-offset-3" style="text-align:right">
												<p>order #<?php echo $value['Order']['ordernumber']?></p>
												<!-- <p class="blue_text"> Order Details <img src="<?php //echo $this->webroot; ?>files/default/cart.png" /></p> -->
											</div>
										</div>
										<?php 

											if(!empty($value['Order']['canceled_date'])){
												$weekday = date('N', $value['Order']['canceled_date']);
												
												$days = [0 => 'Sunday' , 1 => 'Monday', 2 => 'Tuseday' , 3 => 'Wednesday' , 4=> 'Thursday', 5 => 'Friday', 6 => 'Saturday' ];
											?>
												<h4>Canceled <?php echo $days[$weekday]; ?> </h4>
												<p>Your package was canceled </p>
										<?php } ?>
										
										<table class="table">

											<tbody>
												<?php 
												//prx($title);
												if(count($value['OrderItem'])){ 
													foreach ($value['OrderItem'] as $key1 => $value1) { ?>
													<tr>
														<td>
															<?php if(count($Media)){ ?>
																<img width="100px" src="<?php echo $this->webroot.'files/item_other_photo/'.$Media[$value1['product_id']]; ?>" />
															<?php }else{ ?>
 																<img width="100px" src="<?php echo $this->webroot.'files/item_other_photo/default.png'; ?>" />
															<?php } ?>
															
														</td>
														<td><p class="cart_edit_p"><?php echo (count($title)>0) ?ucfirst($title[$value1['product_id']]):'';?> <br> <span> $<?php echo (count($Price)>0)?$Price[$value1['product_id']]:0; ?></span></p></td>

														<td><?php echo $value1['quantity']; ?></td>
													</tr>

													<?php 	}  } ?>
											</tbody>
											</table>

											<?php }
										}else{
											echo "No Orders";
										}
										?>
									</div>
									<!--/.Panel 3-->
								</div>




							</div>

						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script>
			var video = document.getElementById("myVideo");
			var btn = document.getElementById("myBtn");

			function myFunction() {
				if (video.paused) {
					video.play();
					btn.innerHTML = "Pause";
				} else {
					video.pause();
					btn.innerHTML = "Play";
				}
			}
		</script>
		<script>

// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
	for (i = 0; i < elements.length; i++) {
		elements[i].style.width = "100%";
	}
}

// Grid View
function gridView() {
	for (i = 0; i < elements.length; i++) {
		elements[i].style.width = "50%";
	}
} 
</script>
<script>
	$(document).ready(function(){

		var quantitiy=0;
		$('.quantity-right-plus').click(function(e){

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined

        $('#quantity').val(quantity + 1);


            // Increment

        });

		$('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined

            // Increment
            if(quantity>0){
            	$('#quantity').val(quantity - 1);
            }
        });

	});
</script>
</body>
