<?php
//pr($_saved);
if (isset($_msg) && strlen(trim($_msg))) {
	?>
	<div class="col-sm-12 text-center">
		<?php echo $_msg; ?>
	</div>
	<?php
}
if (isset($link) && !$link) {
	echo $this->Form->create('User', ['id' => 'reset_form']);
	?>
	<div class="form-group">
		<?php
		echo $this->Form->input(
				'password', array(
			'label' => false,
			'div' => false,
			'required' => true,
			'class' => 'form-control',
			'placeholder' => 'New password',
			'type' => 'password',
			'value' => '',
			'autocomplete' => 'off',
			'id' => 'password'
				)
		);
		?>
	</div>
	<div class="form-group">
		<?php
		echo $this->Form->input(
				'confirm_password', array(
			'label' => false,
			'div' => false,
			'required' => true,
			'class' => 'form-control',
			'placeholder' => 'Confirm new password',
			'type' => 'password',
			'autocomplete' => 'off',
			'value' => '',
			'id' => 'conf_password'
				)
		);
		?>

	</div>
	<?php if (isset($user_data['User']['password_reset_token']) && !empty($user_data['User']['password_reset_token'])) { ?>
		<input type="hidden" name="data[User][password_reset_token]" id="reset_unique_id" value="<?php echo $user_data['User']['password_reset_token'] ?>">
	<?php } ?> 

	<div class="form-group">
		<input type="submit" class="btn btn-primary" id="otp_btn" value="RESET PASSWORD">
	</div>
	<?php
	echo $this->Form->end();
}

   