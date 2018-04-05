
		</header>
	<body>
		<section class="account">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="acnt_text">
							<h2>Your Account </h2>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<section class=" tabs_list">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="acnt_tabs active_box">
							<a href="<?php echo $this->webroot.'my_order' ?>" ><h3 class=""><img src="<?php echo $this->webroot; ?>files/default/order.png" /><span>Your Order</span></h3></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="acnt_tabs">
							<a href="<?php echo $this->webroot.'sequrity'; ?>" ><h3 class=""><img src="<?php echo $this->webroot; ?>files/default/login.png" /><span>Login & Security</span></h3></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="acnt_tabs">
							<a href="<?php echo $this->webroot.'my_address' ?>" ><h3 class=""><img src="<?php echo $this->webroot; ?>files/default/addrs.png" /><span>Your Address</span></h3></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="acnt_tabs">
							<a href="<?php echo $this->webroot.'my_payment_option' ?>" ><h3 class=""><img src="<?php echo $this->webroot; ?>files/default/pay.png" /><span>Payment Options</span></h3></a>
						</div>
					</div>
				</div>
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
