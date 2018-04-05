<!-- page sidebar -->
<div class="dev-page-sidebar">

	<ul class="dev-page-navigation">
		<li class="title">Welcome!</li>
		<!--		<li class="active">
					<a href="index.html"><i class="fa fa-desktop"></i> <span>Dashboard</span></a>
				</li>-->
		<li class="active">
			<a href="#"><i class="fa fa-file-o"></i> <span>User</span></a>
			<ul>
				<li><a href="<?php echo $this->webroot . 'change_password' ?>">Change Password</a></li>
				<li><a href="<?php echo $this->webroot . 'edit' ?>">Edit Profile</a></li>
				<li><a href="<?php echo $this->webroot . 'logout' ?>">Logout</a></li>
			</ul>
		</li>

	</ul>

</div>