
<div class="sapce_top"></div>
<section class="filter_bn">
	<h3><?php echo (strlen(trim($contents['Content']['title'])) != 0) ? ucfirst($contents['Content']['title']):''; ?></h3>
	<h2><?php echo (strlen(trim($contents['Content']['short_description'])) != 0) ? ucfirst($contents['Content']['short_description']):''; ?></h2>
</section>

<!-- <section class="account">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="acnt_text terms_page">
					<h2><?php //echo (strlen(trim($contents['Content']['title'])) != 0) ? ucfirst($contents['Content']['title']):''; ?></h2>
					<p ><?php //echo (strlen(trim($contents['Content']['short_description'])) != 0) ? ucfirst($contents['Content']['short_description']):''; ?></p>
				</div>
			</div>
		</div>
	</div>
</section> -->
	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="temrs_Data">
						<?php echo (strlen(trim($contents['Content']['full_description'])) != 0) ? ucfirst($contents['Content']['full_description']):''; ?>
					</div>
				</div>
			</div>
		</div>