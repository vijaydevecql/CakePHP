<header>
	<div class="container">
		<div class="logo pull-left"><a href="<?php echo $this->webroot ?>">Logo</a></div>
		<div class="pull-right login">
			<?php
			//prx($_user_data);
			if(isset($_user_data) && is_array($_user_data)) {
				?>
			<a href="<?php echo $this->webroot.'logout' ?>">LOGOUT</a>
				<?php
			} else {
			?>
			<a href="<?php echo $this->webroot.'login' ?>">LOGIN</a>
			<?php
			}
			?>
		</div>
		<div class="pull-right menu">
			<div class="togle"><span></span><span></span><span></span></div>
			<ul class="menu1">
				<li><a href="<?php echo $this->webroot ?>">Home</a></li>
				<li><a href="<?php echo $this->webroot.'blog' ?>">Blog</a></li>
				<li><a href="<?php echo $this->webroot.'product' ?>">Product</a></li>
			</ul>
		</div>

	</div>
</header>

