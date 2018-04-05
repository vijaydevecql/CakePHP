<section class="empty_cell" style="display:none"></section>

<section class="filter_bn">
	<h3> Our Collections</h3>
	<h2>Royality Rug</h2>
</section>

	<!-- add collection links -->

		<?php if (count($_collection_data)) { ?>
	<section class="loyi_section" id="collection_section1">
		<div class="container-fluid">
			<div class="row">
				<?php
				//pr($collection_data);
				foreach ($_collection_data as $key => $value) { ?>

					<div class="col-md-4 col-sm-4 no_padding" style="overflow: hidden; height: 230px;">
						<div class="loyi_block">
							<?php
							$image = 'default.png';
							$_PATH = APP . 'webroot' . DS . 'files' . DS . 'collections' . DS . $value['Collection']['image'];
							if (file_exists($_PATH)) {

								$image = $value['Collection']['image'];
							}
							?>
							<img src="<?php echo $this->webroot . 'files/collections/' . $image; ?>" >
							<div class="title">
								<h2 style="
									cursor: pointer;
									"><?php echo $value['Collection']['title']; ?></h2>
								<a href="<?php echo $this->webroot . 'collection/' . $value['Collection']['slug']; ?>">view collection</a>
							</div>
						</div>
					</div>

				<?php } ?>
			</div>
		</div>
	</section>
	<script>
		$('#collection_section .title h2').on('click', function () {
			window.location.href = $(this).parent().find('a').attr('href');
		});
	</script>

<?php } ?>



	<!-- add collection links -->
<section class="filter_sec">
	<div class="container">


		<div class="col-md-12">
			<h2 class="persian">Persian Rugs</h2>
		</div>
		<div class="tp_icons">
			<div class="col-md-4 col-sm-4">
				<div class="our_prcs owner_sec">
					<div class="col-md-3 col-xs-3 dd">
						<img src="<?php echo $this->webroot . 'files/default' ?>/gadi.png" />
					</div>
					<div class="col-md-9 col-xs-9 dd title_tab">
						<h3>Shipping</h3>
						<p>Is free in all US states</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="our_prcs owner_sec">
					<div class="col-md-3 col-xs-3 dd">
						<img src="<?php echo $this->webroot . 'files/default' ?>/l_mark.png" />
					</div>
					<div class="col-md-9  col-xs-9 dd title_tab">
						<h3>Our Quality</h3>
						<p>Speaks for itself or 100% money back guaranteed</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="our_prcs owner_sec">
					<div class="col-md-3 col-xs-3 dd">
						<img src="<?php echo $this->webroot . 'files/default' ?>/full.png" />
					</div>
					<div class="col-md-9 col-xs-9 dd title_tab">
						<h3>Award Winning</h3>
						<p>Rugs that have the quality nationwide</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3  col-sm-4">
			<h4 class="refine"> Refine</h4>
			

<!-- Mobile Filters -->

<div class="filtr_tabs visible-xs">
<div class="filter_btn"> <i class="fa fa-filter"></i> Filter</div>
<div class="full_width  filter_open">
<div class="col-xs-5" style="padding:0px;">
	<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'Color')" id="defaultOpen">
		<div class="pd_filters"> 
				<h4>By Color</h4>
		</div>  
	  </button>
	  <button class="tablinks" onclick="openCity(event, 'Weave')">
		<div class="pd_filters"> 
			<h4>By Waves</h4>
		</div>  
		</button>
	  <button class="tablinks" onclick="openCity(event, 'Pattern')">
		<div class="pd_filters"> 
			<h4>By Pattern</h4>
		</div> 
	  </button>
	  <button class="tablinks" onclick="openCity(event, 'Size')">
		<div class="pd_filters"> 
			<h4>By Size</h4>
		</div> 
	  </button>
	</div>
	</div>

	<div class="col-xs-7" style="padding:0px;">
		<?php echo $this->Form->create('Product',['id' => 'pd_filters_mobile_form']); ?>
		<div id="Color" class="tabcontent">
			<div class="pd_filters_mobile"> 
				<ul>
					<?php
					$option = [];
					if (count($Color)) {
						foreach ($Color as $value) {
							$option[$value['Color']['id']] = $value['Color']['name'];
						}
					}

					echo $this->Form->input(
							'Color', array(
						'label' => false,
						'div' => false,
						'legend' => false,
						'options' => $option,
						'multiple' => 'checkbox',
						'hiddenField' => false,
						'autocomplete' => 'off',
						//'after' => '<span class="blue-check">abc</span>',
						'class' => 'css-checkbox',
							)
					);
					?>
				</ul>
			</div>
		</div>

		<div id="Weave" class="tabcontent">
		  
			<div class="pd_filters_mobile"> 
				<ul>
					<?php
					$option = [];
					if (count($Weave)) {
						foreach ($Weave as $value) {
							$option[$value['Weave']['id']] = $value['Weave']['name'];
						}
					}

					echo $this->Form->input(
							'Weave', array(
								'label' => false,
								'div' => false,
								'legend' => false,
								'options' => $option,
								'multiple' => 'checkbox',
								'hiddenField' => false,
								'autocomplete' => 'off',
								'class' => 'css-checkbox',
							)
						);
					?>
				</ul>
			</div>
		</div>
	

		<div id="Pattern" class="tabcontent">
		  <div class="pd_filters_mobile"> 
				<ul>
					<?php
					$option = [];
					if (count($Pattern)) {
						foreach ($Pattern as $value) {
							$option[$value['Pattern']['id']] = $value['Pattern']['name'];
						}
					}

					echo $this->Form->input(
							'Pattern', array(
						'label' => false,
						'div' => false,
						'legend' => false,
						'options' => $option,
						'multiple' => 'checkbox',
						'hiddenField' => false,
						'autocomplete' => 'off',
						'class' => 'css-checkbox',
							)
					);
					?>
				</ul>
			</div>
		</div>

		<div id="Size" class="tabcontent">
		  <div class="pd_filters_mobile"> 
				<ul>
					<?php
					$option = [];
					$sizes = Configure::read('sizes');
					if (count($sizes)) {
						foreach ($sizes as $key => $value) {
							$option[$key] = $value;
						}
					}

					echo $this->Form->input(
							'size', array(
						'label' => false,
						'div' => false,
						'legend' => false,
						'options' => $option,
						'multiple' => 'checkbox',
						'hiddenField' => false,
						'autocomplete' => 'off',
						'class' => 'css-checkbox',
							)
					);
					?>
				</ul>
			</div>
		</div>

		<?php echo $this->Form->end(); ?>
	</div>
	</div>
</div>
<!-- Mobile Filters End -->

			
			
			
			
			
			
			<div class="hidden-xs">
			<?php echo $this->Form->create('Product'); ?>


			<div class="pd_filters"> 
				
				<h4><img src="<?php echo $this->webroot . 'files/default' ?>/cart.png" > By Colour</h4>
				<ul>
					<?php
					$option = [];
					if (count($Color)) {
						foreach ($Color as $value) {
							$option[$value['Color']['id']] = $value['Color']['name'];
						}
					}

					echo $this->Form->input(
							'Color', array(
						'label' => false,
						'div' => false,
						'legend' => false,
						'options' => $option,
						'multiple' => 'checkbox',
						'hiddenField' => false,
						'autocomplete' => 'off',
						//'after' => '<span class="blue-check">abc</span>',
						'class' => 'css-checkbox',
							)
					);
					?>
				</ul>
				
			</div>

			<!-- <div class="pd_filters">

				<h4><img src="<?php echo $this->webroot . 'files/default' ?>/cart.png" > Brands</h4>
				<ul> -->
			<?php
			// $option = [];
			// if (count($Brand)) {
			// 	foreach ($Brand as $value) {
			// 		$option[$value['Brand']['id']] = $value['Brand']['name'];
			// 	}
			// }
			// echo $this->Form->input(
			// 		'Brand', array(
			// 	'label' => false,
			// 	'div' => false,
			// 	'legend' => false,
			// 	'options' => $option,
			// 	'multiple' => 'checkbox',
			// 	'hiddenField' => false,
			// 	'autocomplete' => 'off',
			// 		)
			// );
			?>
			<!-- 
							</ul>
						</div> -->

			<div class="pd_filters"> 
				<h4><img src="<?php echo $this->webroot . 'files/default' ?>/cart.png" > Weaves</h4>
				<ul>
					<?php
					$option = [];
					if (count($Weave)) {
						foreach ($Weave as $value) {
							$option[$value['Weave']['id']] = $value['Weave']['name'];
						}
					}

					echo $this->Form->input(
							'Weave', array(
						'label' => false,
						'div' => false,
						'legend' => false,
						'options' => $option,
						'multiple' => 'checkbox',
						'hiddenField' => false,
						'autocomplete' => 'off',
						'class' => 'css-checkbox',
							)
					);
					?>


				</ul>
			</div>

			<div class="pd_filters"> 
				<h4><img src="<?php echo $this->webroot . 'files/default' ?>/cart.png" > By Pattern</h4>
				<ul>
					<?php
					$option = [];
					if (count($Pattern)) {
						foreach ($Pattern as $value) {
							$option[$value['Pattern']['id']] = $value['Pattern']['name'];
						}
					}

					echo $this->Form->input(
							'Pattern', array(
						'label' => false,
						'div' => false,
						'legend' => false,
						'options' => $option,
						'multiple' => 'checkbox',
						'hiddenField' => false,
						'autocomplete' => 'off',
						'class' => 'css-checkbox',
							)
					);
					?>

				</ul>
			</div>

			<div class="pd_filters"> 
				<h4><img src="<?php echo $this->webroot . 'files/default' ?>/cart.png" > By Size</h4>
				<ul>
					<?php
					$option = [];
					$sizes = Configure::read('sizes');
					if (count($sizes)) {
						foreach ($sizes as $key => $value) {
							$option[$key] = $value;
						}
					}

					echo $this->Form->input(
							'size', array(
						'label' => false,
						'div' => false,
						'legend' => false,
						'options' => $option,
						'multiple' => 'checkbox',
						'hiddenField' => false,
						'autocomplete' => 'off',
						'class' => 'css-checkbox',
							)
					);
					?>


				</ul>
			</div>
			</div>
			<!-- <input type="submit" value="Apply Filter" class="col_btn">  -->
			<?php echo $this->Form->end(); ?>
		</div>
		<div class="col-md-9 col-sm-8 col-xs-12">
			<div class="flter_btns hide">
				<button onclick="gridView()"><i class="fa fa-th-large"></i> </button>
				<button onclick="listView()"><i class="fa fa-bars"></i> </button>

				<div class="styled-select blue semi-square">
					<select>
						<option> SHOW</option>
						<option>The second option</option>
						<option>The third option</option>
					</select>
				</div>
				<div class="styled-select blue semi-square">
					<select>
						<option>SORT BY</option>
						<option>The second option</option>
						<option>The third option</option>
					</select>
				</div>						
			</div>
			<div class="row" style="float: left;width: 100%;">


				<?php
					//pr($Product);
				if (count($Product)) {
					foreach ($Product as $key => $value) {
						?>
						<div class="col-md-4 col-sm-6">
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
								<a href="<?php echo $this->webroot . 'product_details/' . str_replace(' ', '_', strtolower($value['Product']['title'])) .'/'.$value['ProductVariants']['id']; ?>">
									<img src="<?php echo $this->webroot . 'files/item_other_photo/' . $image ?>">
									<div class="price_itm">
										<p class="_title"><?php echo strlen(trim($value['Product']['title'])) ? ucfirst($value['Product']['title']) : ''; ?></p>
										<?php
										if ($value['ProductVariants']['discount']) {
											$d = $value['ProductVariants']['price'] - $value['ProductVariants']['discount'];
											if ($d > 0) {
												$p = ceil(($d / $value['ProductVariants']['price']) * 100);
												if ($p > 0) {
													echo '<span>' . $p . '% Off</span>';
												}
											}
										}
										?>

										<p>
											<?php echo!empty($value['ProductVariants']['discount']) ? '<del>$' . $value['ProductVariants']['price'] . '</del>' : ''; ?>
											<b>
												<?php echo!empty($value['ProductVariants']['discount']) ? '$' . $value['ProductVariants']['discount'] : '$' . $value['ProductVariants']['price'] ?>
											</b>
										</p>
										<br />
										<a href="javascript:void(0);" class="add_cart" data-varientid = "<?php echo $value['ProductVariants']['id']; ?>"  data-productid = "<?php echo $value['Product']['id']; ?>" data-collectionid = "<?php echo $value['Product']['collection_id']; ?>">Add To Cart</a>
									</div>
								</a>

							</div>
						</div>
						<?php
					}
				}else{

					echo '<p> No product available under this category.</p>';
				}
				?>
			</div>
			<div class="_pagination">
			<?php 
				if (count($Product)) {
					echo $this->Paginator->prev(' « ', array(), null, array('class' => 'prev disabled ', 'currentClass' => '')); 
					echo '<span class="" style="">';
					echo $this->Paginator->numbers(
							array(
								//'separator' => '',
								//'tag' => 'li',
								//'currentTag' => 'a',
								//'currentClass' => 'active',
							)
					);
					echo '</span>';
					echo $this->Paginator->next('»', array(), null, array('class' => 'next disabled ' ,'currentClass' => '') );
				}
			?>
			</div>
			
		</div>
	</div>

</section>








<!-- <section class="about">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="about_text">
					<h3> ABOUT</h3>
					<h2>Get in Touch</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
					</p>
					<a href="" > Contact</a>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- <footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div class="left_side">
					<span>TERMS</span>
					<span>PRIVACY POLICY</span>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="cntr_logo">
					<img src="<?php echo $this->webroot . 'files/default' ?>/logo_btm.png"/>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="right_side">
					<ul class="">
						<li><img src="<?php echo $this->webroot . 'files/default' ?>/fbb.png" /></li>
						<li><img src="<?php echo $this->webroot . 'files/default' ?>/twb.png" /></li>
						<li><img src="<?php echo $this->webroot . 'files/default' ?>/ytb.png" /></li>
						<li><img src="<?php echo $this->webroot . 'files/default' ?>/inb.png" /></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer> -->
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script type="text/javascript">

	$(document.body).on('click', '.add_cart', function (e) {


		_this = $(this);
		P_id = _this.attr('data-productid');
		C_id = _this.attr('data-collectionid');
		V_id = _this.attr('data-varientid');
		_title = _this.parent().find('p._title').text();

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
				swal("", _title + " added to cart", "success");
				//alert("Product add to cart");
			}
			if (html === '2') {
				swal("", _title + " is already added, so product quantity is increase by 1", "success");
			}
			if (html === '0') {
				swal("", "Try Again Later", "error");
			}
			_this.removeClass('disabled');
		});

	});
	
	$('.pd_filters input[type=checkbox]').click( function () {

		$('#ProductCollectionForm').submit();
	});
	$('.pd_filters_mobile input[type=checkbox]').click( function () {

		$('#pd_filters_mobile_form').submit();
	});
	
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	?>
	$(document).ready( function () {
		$('#ProductCollectionForm').get(0).scrollIntoView();
	});
	<?php
	}
	?>
		
		$('.css-checkbox').append('<span class="blue-check"></span>');
	
</script>
<style>
	input[type=checkbox].css-checkbox {
		position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
	}

	input[type=checkbox].css-checkbox + label.css-label {
		padding-left:35px;
		height:30px; 
		display:inline-block;
		line-height:30px;
		background-repeat:no-repeat;
		background-position: 0 0;
		font-size:30px;
		vertical-align:middle;
		cursor:pointer;

	}

	input[type=checkbox].css-checkbox:checked + label.css-label {
		background-position: 0 -30px;
	}
	label.css-label {
		background-image:url(<?php echo $this->webroot . 'files/images/checkbox-bg.png' ?>);
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
	.pd_filters label {
		padding-left: 15px;
	}
</style>

<script>
$(document).ready(function(){
    $(".filter_btn").click(function(){
        $(".filter_open").slideToggle();
    });
});
</script>