
<html lang="en">

	<body>
		<section class="login">
			<div class="container">
				<div class="row">
					<div class="logo_login" style="">
					<img src="<?php echo $this->webroot; ?>/files/default/logo.png">
					</div>
					<div class="col-md-6 col-md-offset-3 form_box">
						<h2>Login</h2>
						 <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>

							  <div class="form-group">
								<label>Email or mobile phone number</label>
								<?php
							echo $this->Form->input(
								'email', array(
									'label' => false,
									'div' => false,
									'type' => 'email',
									'class' => 'form-control',
									'placeholder' => 'Email',
									'autocomplete' => 'off',
									'required' => true,
								)
							);
							?>
							  </div>
							  <div class="form-group">
								<label>Password:</label>
								<?php
							echo $this->Form->input(
								'password', array(
									'label' => false,
									'div' => false,
									'type' => 'password',
									'class' => 'form-control',
									'placeholder' => 'password',
									'autocomplete' => 'off',
									'required' => true,
								)
							);
							?>
							  </div>

							  <button type="submit" class="btn btn-default submit">Sign in</button>
						<?php echo $this->Form->end(); ?>
				</div>
					</div>
					<div class="col-md-6 col-md-offset-3 new_here">
						<div class="col-md-4 col-sm-3 col-xs-2 line"></div>
						<div class="col-md-4 col-sm-6 col-xs-8"> <p style="text-align:center">New to Royality Rug?</p></div>
						<div class="col-md-4 col-sm-3 col-xs-2 line"></div>
						 
					</div>
					<div class="col-md-6 col-md-offset-3 form_box_2">
						<a href="<?php echo $this->webroot.'sign_up' ?>" class="btn btn-default signup" style=" text-decoration: none !important">Sign Up</a>
					</div>
				</div>
			</div>
		</section>
		<section class="login_footer">
			<div class="terms">
			<p> <span>Conditions of Use </span> <span>Privacy Notice </span> <span>help </span> </p>
			<p > 2017,royalityrug.com </p>
			</div>
			
		</section>
		
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>
	</body>
</html>