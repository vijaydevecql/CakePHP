<?php
echo $this->Form->create('User', array('class' => 'form-horizontal'));
//echo $this->Form->input('id', array('type' => 'hidden'));
?>
<div class="form-group">
	<label class="col-md-3 control-label">Current Password</label>
	<div class="col-md-7">
		<?php
		echo $this->Form->input(
				'password', array(
			'label' => false,
			'div' => false,
			'class' => 'form-control',
			'placeholder' => 'Current Password',
				)
		);
		?>
	</div>
</div>
<div class="form-group passes">
	<label class="col-md-3 control-label">New Password</label>
	<div class="col-md-7">
		<?php
		echo $this->Form->input(
				'new_password', array(
			'label' => false,
			'type' => 'password',
			'div' => false,
			'class' => 'form-control',
			'placeholder' => 'New Password',
				)
		);
		?>
	</div>
</div>
<div class="form-group passes">
	<label class="col-md-3 control-label">Repeat New Password</label>
	<div class="col-md-7">
		<?php
		echo $this->Form->input(
				'repeat_new_password', array(
			'label' => false,
			'type' => 'password',
			'div' => false,
			'class' => 'form-control',
			'placeholder' => 'Repeat New Password',
				)
		);
		?>
	</div>
</div>
<div class="form-group">
	<label class="col-md-3 control-label">Show / Hide New Passwords</label>
	<div class="col-md-2 ">
		<label class="switch">
			<input type="checkbox" name="switch_1" id="show-hide-password" />
			<span></span>
		</label>
	</div>
</div>

<div class="form-group">
	<div class="col-md-offset-2 col-md-4">
		<button type="submit" class="btn btn-default btn-primary">Update Password</button>
	</div>
	<div class="col-md-offset-2 col-md-4">
		<a href="<?php echo $this->webroot . (isset($admin) ? 'admin' : '') ?>" class="btn btn-default btn-danger">Cancel</a>
	</div>
</div>
<?php echo $this->Form->end(); ?>

<script>
	$(document).ready( function () {
		if($('.switch input').attr('checked')) {
			$('.passes input').attr('type', 'text');
		}
		
		$('.switch input').on('click', function () {
			if($('#show-hide-password').is(':checked')) {
				$('.passes input').attr('type', 'text');
			} else {
				$('.passes input').attr('type', 'password');
			}
		});
	});
</script>
