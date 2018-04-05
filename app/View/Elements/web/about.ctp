<section class="about">
	
<?php if ($about == 1) {
 ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="about_text">
						<h3><?php echo $about2['Content']['name']; ?></h3>
						<h2><?php echo $about2['Content']['title']; ?></h2>
						<p><?php echo $about2['Content']['short_description']; ?></p>
						<a href="<?php echo $this->webroot.'contact'; ?>"> Contact</a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

</section>