<?php
$class = isset($params) && isset($params['class']) && strlen(trim($params['class'])) ? $params['class'] : (isset($class) && strlen($class) ? $class : 'info');
?>
<div class="row">
	<div class="col-md-12">
		<div id="flash_web" style="" class="alert alert-dismissible alert-<?php echo $class ?>" role="alert">
			<button 
				type="button" 
				class="close" 
				data-dismiss="alert" 
				aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
			<?php echo (isset($message) ? $message : ''); ?>
			<?php if (!isset($return)) { ?>
			<span class="too_small">
				<button 
					type="button" 
					class="close hide" 
					data-dismiss="alert" 
					aria-label="Close">
					[x]</button>
			</span>
			<?php } ?>
		</div>
	</div>
</div>
