<div class="row">
	<div class="col-md-12">
		<?php
		/*
		<!--
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Well done!</strong> You successfully read this important alert message.
		</div>
		<div class="alert alert-info alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Heads up!</strong> This alert needs your attention, but it's not super important.
		</div>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Warning!</strong> Better check yourself, you're not looking too good.
		</div>
		-->
		*/
		//pr($this->Session->read());
		?>
		<div id="flash_close" class="alert alert-dismissible <?php echo $class ?>" role="alert">
			<button 
				type="button" 
				class="close" 
				data-dismiss="alert" 
				aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
			<?php echo (isset($message) ? $message : ''); ?>
		</div>
	</div>
</div>
