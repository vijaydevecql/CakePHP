<section class="empty_cell" style="display:none"></section>
		<section class="banner1">
			<h3> About</h3>
			<h2>Royality Rug</h2>
		</section>
<section class="about_list owner_sec">
	<div class="container">
		<?php
			if(count($about))
			{
				foreach ($about as $key => $value) {

					 $k = $key+1;
					  ?>

				<div class="row">
					<h3 class="year_nm"><?php echo ($value['About']['name'] == 2017 ) ?  $value['About']['name']."<br><br>RoyaltyRug.com was born" :  $value['About']['name']; ?></h3>
					<?php if($value['About']['name'] == 2017 )
					{ ?>
					<div class=" col-sm-6  col-md-12 1  img_shift pull-right dd">
						<div class="onr_text <?php echo(empty($value['About']['image'])) ?  'dis' :'' ; ?>">
							<h3 style="text-align: left;"><?php echo $value['About']['description']; ?></h3>
						</div>
					</div>
					<div class=" col-sm-6 col-md-12 2 text-center img_shift pull-right dd" >

						<div class="onr_img about_page_b_logo">
							<?php
								$image = 'default.png';
								$_img = false;
								if(strlen(trim($value['About']['image']))){
									$_PATH = APP.'webroot'.DS.'files'.DS.'images'.DS.$value['About']['image'];
									if(file_exists($_PATH))
									{
										$image = $value['About']['image'];
										$_img = true;
									}
								}
								?>
							<?php
								if($_img)
								{
							?>
							<img src="<?php echo $this->webroot.'files/images/'.$image; ?>" >
						<?php }else{  echo ""; }?>

						</div>
					</div>
				<?php }else {?>
				<div class=" col-sm-6 col-md-6 dd  <?php
														if($k%2==0 && strlen(trim($value['About']['image'])))
															{
																echo 'pull-right img_shift';
															}elseif(empty($value['About']['image'])){ echo 'd-none';} ?>" >

					<div class="onr_img <?php if(empty($value['About']['image'])){echo 'd-none';} ?>">
						<?php
							$image = 'default.png';
							$_img = false;
							if(strlen(trim($value['About']['image']))){
								$_PATH = APP.'webroot'.DS.'files'.DS.'images'.DS.$value['About']['image'];
								if(file_exists($_PATH))
								{
									$image = $value['About']['image'];
									$_img = true;
								}
							}
							?>
						<?php
							if($_img)
							{
						?>
						<img src="<?php echo $this->webroot.'files/images/'.$image; ?>" style="height:100%;">
					<?php }else{  echo ""; }?>

					</div>
				</div>

					<div class=" col-sm-6  <?php echo(empty($value['About']['image'])) ?  'col-md-12' :'col-md-6' ; ?> dd <?php echo($k%2==0) ? 'pull-right img_shift' : '' ?>">
						<div class="onr_text <?php echo(empty($value['About']['image'])) ?  'dis' :'' ; ?>">
							<h3 style="text-align: left;"><?php echo $value['About']['description']; ?></h3>
						</div>
					</div>
				</div>
			<?php	}
			}
		}
		?>
	</section>
	<br />
	<br />

</body>
<script>
$(document).ready(function() {
	$('.d-none').hide();
		$('.dis').css("display", "block");
		$('.dis > h3').css('text-align','center');
});
</script>
