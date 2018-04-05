<p>Login to your admin account</p>
<?php echo $this->Form->create('User'); ?>
<div class="form-group">
	<?php
		echo $this->Form->input('email',
				[
					'class'=>'form-control',
					'placeholder'=>'Username',
					'type'=>'text',
					'label'=>[
						'class' => 'sr-only'
					],
					'div'=>false,
				]);
	?>
</div>
<div class="form-group">
	<?php
		echo $this->Form->input('password',
				[
					'class'=>'form-control',
					'placeholder'=>'Password',
					'type'=>'password',
					'label'=>[
						'class' => 'sr-only'
					],
					'div'=>false,
				]);
	?>
</div>
<!--
<div class="form-group clearfix">
	<a class="pull-right" href="forgot-password.html">Forgot password?</a>
</div>
-->
<button type="submit" class="btn btn-primary btn-block">Sign in</button>
<?php echo $this->Form->end(); ?>