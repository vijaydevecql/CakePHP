<section class="filter_bn">
	<h3> Our Collections</h3>
	<h2>Royality Rug</h2>
</section>

<section class="filter_sec">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="product_list">
					<ul class="small_list">
						<?php
							$image = '';
							if (count($product_data['Media'])) {
								foreach ($product_data['Media'] as $key1 => $value1) {
									if ($value1['default'] == 1) {
										$_PATH = APP . 'webroot' . DS . 'files' . DS . 'item_other_photo' . DS . $value1['image'];
										if (file_exists($_PATH)) {

											$image = $value1['image'];
										}
									}
								}
								if (strlen(trim($image)) == 0) {
									$image = $product_data['Media'][0]['image'];
								}
							} else {
								$image = 'default.png';
							}
						?>

						<?php
						if (count($product_data['Media'])) {
							foreach ($product_data['Media'] as $key1 => $value1) {

								$_PATH = APP . 'webroot' . DS . 'files' . DS . 'item_other_photo' . DS . $value1['image'];
								$a = true;
								if (file_exists($_PATH)) {
									?>
									<li>
										<a href="javascript:void(0);">
											<img class="thumbnail" src="<?php echo $this->webroot . 'files/item_other_photo/' . $value1['image']; ?>"
											/>
										</a>
									</li>
									<?php			
								}
							}
						}
						?>
					</ul>
					<img src="<?php echo $this->webroot . 'files/item_other_photo/' . $image; ?>" class="xzoom" xoriginal="<?php echo $this->webroot . 'files/item_other_photo/' . $image; ?>" id="main_sec"/>
					<p style="text-align:center; margin-top:20px;" class="zoom_on hide">Roll over image to zoom in</p>
				</div>
			</div>
			<div class="col-md-2">
				<?php if(!empty($product_data['Product']['video'])){ ?>

							<!-- <video  src="<?php //echo $this->webroot.'files/video/'.$product_data['Product']['video']; ?>" class="myvideo">
							Your browser does not support the video tag.
							</video> -->
						<div class="video_clock">
							<video width="100%" height="250px" class="myvideo">
							  <source src="<?php echo $this->webroot.'files/video/'.$product_data['Product']['video']; ?>" type="video/mp4">
							  <source src="<?php echo $this->webroot.'files/video/'.$product_data['Product']['video']; ?>" type="video/webm">
							  <source src="<?php echo $this->webroot.'files/video/'.$product_data['Product']['video']; ?>" type="video/ogg"> 
							  <source src="<?php echo $this->webroot.'files/video/'.$product_data['Product']['video']; ?>" type="video/quicktime">
							  I'm sorry; your browser doesn't support HTML5 video.
							</video>
						</div>
							
							<?php } ?>
			
			</div>
			
			
			
			<div class="col-md-5">
				<div class="prdct_details" >
					<?php if (count($product_data)) { ?>
						<h2 class="_title" ><?php echo ucfirst($product_data['Product']['title']); ?></h2>
						<!-- <p class="rate_p" style=""> <img src="images/stars.png" /> <span> 440 customer reviews | 29 answerd questions</span> </p> -->

							<p class="prc_del <?php echo (!empty($product_data['ProductVariants']['discount'])) ? 'show' : 'hide';?> ">M.R.P.: <del id="mrp" >$<?php echo @$product_data['ProductVariants']['price']; ?></del></p>
							<!-- <p class="prc_del">Price: <span>$ <?php echo $product_data['ProductVariants']['discount']; ?></span>  $1000<a class="href" >Detils</a></p> -->
							<p  class="prc_del ">Price: <span id="price_p">$ <?php echo (!empty($product_data['ProductVariants']['discount'])) ? @$product_data['ProductVariants']['discount'] : @$product_data['ProductVariants']['price']; ?></span>  </p>
							<p class="prc_del <?php echo (!empty($product_data['ProductVariants']['discount'])) ? 'show' : 'hide';?> ">You Save: <span id="you_save" >$ <?php echo @$product_data['ProductVariants']['price'] - @$product_data['ProductVariants']['discount']; ?> (<?php echo round( (($product_data['ProductVariants']['price'] - $product_data['ProductVariants']['discount']) / $product_data['ProductVariants']['price']) * 100,2); ?>%)</span> <br> Inclusive of all taxes</p>
						

							<div class="col-md-6">
								<div class="form-group">
									<label>Size</label>
									<select class="form-control change_var" id="size_select" data-productid = "<?php echo $product_data['Product']['id']; ?>">
										<?php foreach ($sizes as $key => $value) {
										 ?>
											<option value="<?php echo $key; ?>" <?php echo ($product_data['ProductVariants']['size'] == $key) ? "selected" : "";?> ><?php echo $value; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label>Color</label>
									<select class="form-control change_var" id="color_select"  data-productid = "<?php echo $product_data['Product']['id']; ?>">
										<?php foreach ($color as $key => $value) {
										 ?>
											<option value="<?php echo $key; ?>" <?php echo ($product_data['ProductVariants']['color_id'] == $key) ? "selected" : "";?> ><?php echo $value; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						
						<!-- <p class="cpn" style=""> <img src="<?php echo $this->webroot ?>files/default/cp.png" /> <span> Coupon available for Subscribe & Save purchase option only </span>  -->
							<!-- <a class="href" >Details</a> -->
							
						</p>
						<!-- <p class="prc_del"> <b>Cash on Delivery</b> eligble.</p> -->
						<p class="grn_text"> In Stock.</p>
						<br />
						<!-- <p class="prc_del"> <b style="color:#008a2f" >Guaranted</b> delivery to pincode <b> 160055 </b>- Chandigarh by <b> Thursday, December 21</b>with <b> two-day delivery  </b>- order in the next <b style="color:#008a2f" >21 hours and 43 minutes</b><a class="href" >Detils</a></p> -->
					<a href="javascript:void(0);" class="add_cart my_cart_btn" id="s_add_cart" data-varientid = "<?php echo $product_data['ProductVariants']['id']; ?>" data-productid = "<?php echo $product_data['Product']['id']; ?>" data-collectionid = "<?php echo $product_data['Product']['collection_id']; ?>">Add To Cart</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if (count($other_product)) { ?>
	<section class="prdct_sec">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Similer Products</h2>
				</div>
				<?php 
				//pr($other_product);

				foreach ($other_product as $key => $value) { ?>
					<div class="col-md-3 col-sm-6">

						<div class="product_itms">
							<?php
							$image = '';
							if (count($value['Media'])) {
								foreach ($value['Media'] as $key1 => $value1) {
									if ($value1['default'] == 1) {
										$_PATH = APP . 'webroot' . DS . 'files' . DS . 'item_other_photo' . DS . $value1['image'];
										if (file_exists($_PATH)) {

											$image = $value1['image'];
										}
									}
								}
								if (strlen(trim($image)) == 0) {
									$image = $value['Media'][0]['image'];
								}
							} else {
								$image = 'default.png';
							}
							?>
							<a href="<?php echo $this->webroot . 'product_details/' . str_replace(' ', '_', strtolower($value['Product']['title'])) .'/'.$value['ProductVariant'][0]['id']; ?>">
								<img src="<?php echo $this->webroot . 'files/item_other_photo/' . $image; ?>" />

								<div class="price_itm">
									<p><?php
									echo strlen($value['Product']['description'] > 50) ?  substr($value['Product']['description'], 0, 45).'...' : $value['Product']['description'];
									?></p>
									<?php if (!empty($value['Product']['discount'])) { ?>
										<span><?php echo round((($value['ProductVariant'][0]['price'] - $value['ProductVariant'][0]['discount']) / $value['ProductVariant'][0]['price']) * 100, 2); ?>%off</span>
										<p><del>$<?php echo round($value['ProductVariant'][0]['price']); ?></del><b>$<?php echo round($value['ProductVariant'][0]['discount']); ?></b></p>
									<?php } else { ?>
										<p<b>$<?php echo round($value['ProductVariant'][0]['price'], 2); ?></b></p>
									<?php } ?>
									
									<a href="javascript:void(0);" class="add_cart" data-productid = "<?php echo $value['Product']['id']; ?>" data-varientid = "<?php echo $value['ProductVariant'][0]['id']; ?>" data-collectionid = "<?php echo $value['Product']['collection_id']; ?>">Add To Cart</a>
									
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

<?php }
?>
<script type="text/javascript">

	$(document).ready(function () {
		$(".myvideo").hover( hoverVideo, hideVideo );

		$('body').on('click','.myvideo', function () {
			//alert(this.paused);
			this.paused ? this.play() : this.pause();
		});


	});

	$(document.body).on('click', '.thumbnail', function (e) {
		var src = $(this).attr('src');
		$("#main_sec").attr('src',src);
		$("#main_sec").attr('xoriginal',src);
		
	});

	$(document.body).on('change', '.change_var', function (e) {
			
		var productid = $(this).data('productid');

		var size_selected = $('#size_select').val();
		var color_selected = $('#color_select').val();

		var url = "<?php echo $this->webroot . 'collections/product_detail_ajax/' ?>";
		$.ajax({
				url: url,
				type: 'POST',
				data: { 'id' : productid , 'size_selected' :size_selected , 'color_selected':color_selected},
				cache: false
		}).done(function (html) {

			html = JSON.parse(html);

			//alert(html.code);

			if (html.code === 0) {

				swal("",  html.msg, "error");
				$('#s_add_cart').removeClass('add_cart');
			}else{

				console.log(html.data);
				
				var price = parseInt(html.data.ProductVariants.price);
				var discount = parseInt(html.data.ProductVariants.discount);

				$('#s_add_cart').attr('data-varientid',html.data.ProductVariants.id );

				if(html.data.ProductVariants.discount != 0){

					var amount = price - discount;

					var percent = (amount / price) * 100;
						
					percent = percent.toFixed(2);

					$("#mrp").parent().removeClass('hide');
					$("#you_save").parent().removeClass('hide');


					// set mrp
					$("#mrp").parent().addClass('show');
					$("#mrp").html("$ "+price);
					// set product price
					$("#price_p").html("$ "+discount);

					// set you_save
					$("#you_save").parent().addClass('show');
					$("#you_save").html("$ "+ amount + " ( " + percent + " )" );


					//alert(html.data.ProductVariants.discount);
				}else{

					$("#mrp").parent().removeClass('show');
					$("#you_save").parent().removeClass('show');

					$("#mrp").parent().addClass('hide');
					$("#you_save").parent().addClass('hide');
					// set product price
					$("#price_p").html("$ "+price);

				}

				// mrp
				// price_p
				// you_save
				$('#s_add_cart').addClass('add_cart');
			}
			//_this.removeClass('disabled');
		});

	});

	function hoverVideo(e) {  
	    $(this).get(0).play(); 
	}

	function hideVideo(e) {
	    $(this).get(0).pause(); 
	}

	$(document.body).on('click', '.add_cart', function (e) {
		_this = $(this);
		P_id = _this.attr('data-productid');
		C_id = _this.attr('data-collectionid');
		V_id = _this.attr('data-varientid');

		_title = $('._title').text();

		var url = "<?php echo $this->webroot . 'collections/add_to_cart/' ?>" + P_id + '/' + C_id + '/' + V_id;
		
		_this.addClass('disabled');
		$.ajax({
				url: url,
				cache: false
			}).done(function (html) {
				if (html === '1') {
					// $("#cart").removeClass("beges");
					// $("#cart").addClass("beges");
					var cart_num = $(".beges").html();
					card_num = parseInt(cart_num) + 1;
					$('.beges').html(card_num);
					swal("",  _title +" added to cart", "success");
					//alert("Product add to cart");
				}
				if (html === '2') {
					swal("",  _title +" is already added, so product quantity is increase by 1", "success");
					
				}
				if (html === '0') {
					swal("", "Try Again Later", "error");
				}
				_this.removeClass('disabled');
			});
		});
		$(".xzoom").xzoom({tint: '#333', Xoffset: 15});
	</script>