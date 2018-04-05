<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
				data-toggle="menubar">
			<span class="sr-only">Toggle navigation</span>
			<span class="hamburger-bar"></span>
		</button>
		<button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
				data-toggle="collapse">
			<i class="icon wb-more-horizontal" aria-hidden="true"></i>
		</button>
		<button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
				data-toggle="collapse">
			<span class="sr-only">Toggle Search</span>
			<i class="icon wb-search" aria-hidden="true"></i>
		</button>
		<div class="navbar-brand navbar-brand-center" data-toggle="gridmenu">
			<a href="<?php echo $this->webroot; ?>admin/users"><img class="navbar-brand-logo" src="<?php echo $this->webroot.'files/logo/logo1.png' ?>" title="<?php echo APP_NAME ?>"></a>
			<span class="navbar-brand-text"><?php echo APP_NAME ?></span>
		</div>
	</div>

	<div class="navbar-container container-fluid">
		<!-- Navbar Collapse -->
		<div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
			<!-- Navbar Toolbar -->
			<ul class="nav navbar-toolbar">
				<li class="hidden-float" id="toggleMenubar">
					<a data-toggle="menubar" href="#" role="button">
						<i class="icon hamburger hamburger-arrow-left">
							<span class="sr-only">Toggle menubar</span>
							<span class="hamburger-bar"></span>
						</i>
					</a>
				</li>
				<li class="hidden-xs" id="toggleFullscreen">
					<a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
						<span class="sr-only">Toggle fullscreen</span>
					</a>
				</li>
			</ul>
			<!-- End Navbar Toolbar -->
			
			<!-- Navbar Toolbar Right -->

			<ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
				<li class="dropdown">
					<a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="slide-bottom" role="button">
					<i class="icon wb-user"></i> 
            		</a>
					<ul class="dropdown-menu" role="menu">
						<li class="presentation">
							<a
							class="navbar-avatar"
							href="<?php echo $this->webroot.'admin/profile' ?>" >
							
								Profile 
							</a>
						</li>
						<li class="presentation">
							<a
							class="navbar-avatar"
							href="<?php echo $this->webroot.'admin/change_password' ?>" >
							
								Change Password
							</a>
						</li>
					 </ul>
				</li>
				 
				  

              
              <!--li role="presentation">
                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
              </li>
              <li role="presentation">
                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
              </li-->
             <li class="dropdown">
					<a 
						class="navbar-avatar"
						href="<?php echo $this->webroot.'admin/logout' ?>" >
						<i class="icon wb-power"></i> Logout
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
