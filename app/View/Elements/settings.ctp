<?php
echo $this->Form->create('User', array('class' => 'form-horizontal'));
?>
<div class="form-group">
	<label class="col-md-3 control-label">Expand sidebar</label>
	<div class="col-md-2 ">
		<label class="switch">
			<!-- <input type="checkbox" name="switch_1" id="show-hide-password" /> -->
			<?php
			echo $this->Form->input('sidebar_rollup', array(
				'type' => 'checkbox',
				'label' => false,
				'div' => false,
			));
			?>
			<span></span>
		</label>
	</div>
</div>

<div class="form-group">
	<div class="col-md-offset-2 col-md-4">
		<button type="submit" class="btn btn-default btn-primary">Update Settings</button>
	</div>
	<div class="col-md-offset-2 col-md-4">
		<a href="<?php echo $this->webroot . (isset($admin) ? 'admin' : '') ?>" class="btn btn-default btn-danger">Cancel</a>
	</div>
</div>
<?php echo $this->Form->end(); ?>

<script>
	$(document).ready( function () {
		
	});
</script>
