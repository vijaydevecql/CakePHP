<div class="site-menubar">
	<div class="site-menubar-body">
		<div>
			<div>
				<ul class="site-menu">
					<li class="site-menu-item">
						<a class="animsition-link" href="<?php echo $this->webroot . 'admin/dashboard' ?>" data-slug="users-listing">
							<i class="site-menu-icon  fa fa-tachometer" aria-hidden="true"></i>
							<span class="site-menu-title">Dashboard</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="animsition-link" href="<?php echo $this->webroot . 'admin/users' ?>" data-slug="users-listing">
							<i class="site-menu-icon  fa fa-users" aria-hidden="true"></i>
							<!-- <i class="site-menu-icon wb-grid-4" aria-hidden="true"></i> -->
							<span class="site-menu-title">Users</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="animsition-link" href="<?php echo $this->webroot . 'admin/collections'; ?>" data-slug="articles-listing">
							<i class="site-menu-icon  fa fa-briefcase" aria-hidden="true"></i>
							<span class="site-menu-title">Collection</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="animsition-link" href="<?php echo $this->webroot . 'admin/categories'; ?>" data-slug="articles-listing">
							<i class="site-menu-icon  fa fa-tags" aria-hidden="true"></i>
							<span class="site-menu-title">Categories</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="animsition-link" href="<?php echo $this->webroot . 'admin/products'; ?>" data-slug="articles-listing">
							<i class="site-menu-icon fa fa-product-hunt" aria-hidden="true"></i>
							<span class="site-menu-title">Products</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="animsition-link" href="<?php echo $this->webroot . 'admin/orders'; ?>" data-slug="articles-listing">
							<i class="site-menu-icon fa fa-shopping-cart" aria-hidden="true"></i>
							<span class="site-menu-title">Order</span>
						</a>
					</li>
					<li class="site-menu-item has-sub">
						<a href="javascript:void(0)" data-slug="layout">
							<i class="site-menu-icon fa fa-tags" aria-hidden="true"></i>
							<span class="site-menu-title">Product Attributes</span>
							<span class="site-menu-arrow"></span>
						</a>
						<ul class="site-menu-sub" style="">
							<li class="site-menu-item is-shown">
								<a class="animsition-link" href="<?php echo $this->webroot . 'admin/colors'; ?>" data-slug="layout-headers">
									<i class="site-menu-icon fa fa-pencil" aria-hidden="true"></i>
									<span class="site-menu-title">Colors</span>
								</a>
							</li>
							<li class="site-menu-item is-shown">
								<a class="animsition-link" href="<?php echo $this->webroot . 'admin/brands'; ?>" data-slug="layout-grids">
									<i class="site-menu-icon fa-info" aria-hidden="true"></i>
									<span class="site-menu-title">Brands</span>
								</a>
							</li>
							<li class="site-menu-item is-shown">
								<a class="animsition-link" href="<?php echo $this->webroot . 'admin/weaves'; ?>" data-slug="layout-headers">
									<i class="site-menu-icon fa fa-file-word-o" aria-hidden="true"></i>
									<span class="site-menu-title">Weaves</span>
								</a>
							</li>
							<li class="site-menu-item is-shown">
								<a class="animsition-link" href="<?php echo $this->webroot . 'admin/patterns'; ?>" data-slug="layout-headers">
									<i class="site-menu-icon fa fa-lock" aria-hidden="true"></i>
									<span class="site-menu-title">Patterns</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="site-menu-item">
						<a class="animsition-link" href="<?php echo $this->webroot . 'admin/promos'; ?>" data-slug="articles-listing">
							<i class="site-menu-icon fa fa-cog" aria-hidden="true"></i>
							<span class="site-menu-title">Promotional Code</span>
						</a>
					</li>
					
				<!-- 	<li class="site-menu-item">
						<a class="animsition-link" href="<?php //echo $this->webroot . 'admin/presses'; ?>" data-slug="articles-listing">
							<i class="site-menu-icon  fa fa-cog" aria-hidden="true"></i>
							<span class="site-menu-title">Press Page</span>
						</a>
					</li> -->

					<li class="site-menu-item has-sub">
						<a href="javascript:void(0)" data-slug="layout">
							<i class="site-menu-icon fa fa-cog" aria-hidden="true"></i>
							<span class="site-menu-title">CMS</span>
							<span class="site-menu-arrow"></span>
						</a>
						<ul class="site-menu-sub" style="">
							<li class="site-menu-item is-shown">
								<a class="animsition-link" href="<?php echo $this->webroot . 'admin/CMS'; ?>" data-slug="articles-listing">
									<i class="site-menu-icon  fa fa-cog" aria-hidden="true"></i>
									<span class="site-menu-title">CMS</span>
								</a>
							</li>
							<li class="site-menu-item is-shown">
								<a class="animsition-link" href="<?php echo $this->webroot . 'admin/abouts'; ?>" data-slug="articles-listing">
									<i class="site-menu-icon fa fa-cog" aria-hidden="true"></i>
									<span class="site-menu-title">About Page</span> 
								</a>
							</li>
							<li class="site-menu-item is-shown">
								<a class="animsition-link" href="<?php echo $this->webroot . 'admin/email_templates'; ?>" data-slug="articles-listing">
									<i class="site-menu-icon fa fa-envelope" aria-hidden="true"></i>
									<span class="site-menu-title">Email Template</span>
								</a>
							</li>
						</ul>
					</li>
					
					<li class="site-menu-item">
						<a class="animsition-link" href="<?php echo $this->webroot . 'admin/setting'; ?>" data-slug="articles-listing">
							<i class="site-menu-icon  fa fa-cog" aria-hidden="true"></i>
							<span class="site-menu-title">Settings</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php //echo $this->element('admin/sidebar-footer'); ?>

</div>
