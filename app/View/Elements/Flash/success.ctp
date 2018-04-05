<?php
	$class = isset($params['class']) && strlen(trim($params['class'])) ? $params['class'] : (isset($class) && strlen($class) ? $class : '');
?>
<div
	class="toast-success"
	id="ToastrSuccess"
	aria-live="polite"
	data-plugin="toastr"
	data-title=" "
	data-message="<?php echo (isset($message) ? $message : ''); ?>"
	data-container-id="toast-top-right"
	data-position-class="toast-top-right"
	data-icon-class="toast-just-text toast-<?php echo $class ?>"
	role="alert"
	style="display: none;"
	>
	<div class="toast toast-just-text toast-success">
		<button type="button" class="toast-close-button" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>

		<div class="toast-message">
			<?php //echo (isset($message) ? $message : ''); ?>
		</div>
	</div>
</div>
